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
        // replace this example code with whatever you need
        return $this->render('/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
    * @Route("/categories", name="categories_list")
    */
   public function categoriesListAction(Request $request)
   {
       // $categories = $this
       //     ->getDoctrine()
       //     ->getRepository('AppBundle:Category')
       //     ->findAll()
       // ;
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
        return $this->render('categories/categories_details.html.twig', [
          'category' => $category
        ]);
    }


}
