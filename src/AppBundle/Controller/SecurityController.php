<?php

namespace AppBundle\Controller;


use AppBundle\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $formLogin = $this->createForm(LoginType::class);


        return $this->render('::login.html.twig', array(
            'formLogin' => $formLogin->createView()
        ));


    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }

}