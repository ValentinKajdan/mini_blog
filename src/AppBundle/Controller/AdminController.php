<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin", name="admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="index_admin")
     */
    public function indexAction()
    {
        return $this->render('admin/index.html.twig', []);
    }
}
