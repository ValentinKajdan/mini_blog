<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class UserController extends Controller
{
    /**
     * @Route("/login", name="menu_login")
     */
    public function loginAction(Request $request)
    {
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $connexion = $this
                ->getDoctrine()
                ->getRepository('AppBundle:User')
                ->getUser($user['email'], $user['password'])
            ;

            if ($connexion) {
              echo 'Vous êtes connecté !!';
            }

            echo var_dump($user, $connexion);
        }

        return $this->render('user/login.html.twig', [
          'form' => $form->createView()
        ]);
    }
}
