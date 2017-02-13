<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Intl;
use AppBundle\Entity\Comments;
use AppBundle\Entity\Articles;
use AppBundle\Entity\Category;
use AppBundle\Form\CommentType;
use AppBundle\Form\ArticleType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $articles = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Articles')
            ->getLastFive()
        ;
        return $this->render('/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'articles' => $articles
        ]);
    }

    /**
    * @Route("/categories", name="categories_list")
    */
   public function categoriesListAction(Request $request)
   {
       $categories = $this
           ->getDoctrine()
           ->getRepository('AppBundle:Category')
           ->findBy([])
       ;
       return $this->render('categories/categories_list.html.twig', [
           'categories' => $categories
       ]);
   }

   /**
     * @Route("/categories/{id}", name="categories_name")
     */
    public function categoriesDetailsAction(Request $request, $id)
    {
        $category = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->getById($id)
        ;
        $articles = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Articles')
            ->getByIdCat($id)
        ;
        return $this->render('categories/categories_details.html.twig', [
          'category' => $category,
          'articles' => $articles
        ]);
    }

    /**
     * @Route("/articles", name="articles_list")
     */
    public function articlesAction(Request $request)
    {
        $articles = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Articles')
            ->findBy([])
        ;
        return $this->render('articles/articles_list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'articles' => $articles
        ]);
    }

  /**
    * @Route("/articles/{id}", name="articles_name")
    */
     public function articlesDetailsAction(Request $request, $id)
     {
         $article = $this
             ->getDoctrine()
             ->getRepository('AppBundle:Articles')
             ->getById($id)
         ;
         $comments = $this
             ->getDoctrine()
             ->getRepository('AppBundle:Comments')
             ->getByIdArt($id)
         ;

         $comment = new Comments();
         $form = $this->createForm(CommentType::class, $comment);

         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $comment = $form->getData();
             $comment->setIdArticle($article);
             $comment->setDate();
            //  $comment->setId(1);

            // dump($comment);

             $em = $this->getDoctrine()->getManager();
             $em->persist($comment);
             $em->flush($comment);

             return $this->redirectToRoute('articles_name', [
                 'id' => $id
             ]);
         }

         return $this->render('articles/articles_details.html.twig', [
           'article' => $article,
           'comments' => $comments,
           'form' => $form->createView()
         ]);
     }

     /**
       * @Route("/article/new", name="articles_new")
       */
        public function newArticlesDetailsAction(Request $request)
        {
            $categories = $this
                ->getDoctrine()
                ->getRepository('AppBundle:Category')
                ->findBy([])
            ;

            $article =  new Articles();

            $form = $this->createForm(ArticleType::class, $article);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                $article->setDate();
                $article->setIdCat($cat);

                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush($article);

                return $this->redirectToRoute('articles_list');
            }

            return $this->render('articles/articles_new.html.twig', [
              'form' => $form->createView()
            ]);
        }


}
