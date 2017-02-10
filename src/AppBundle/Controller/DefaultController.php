<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
            ->findBy([])
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
         return $this->render('articles/articles_details.html.twig', [
           'article' => $article,
           'comments' => $comments
         ]);
     }


}
