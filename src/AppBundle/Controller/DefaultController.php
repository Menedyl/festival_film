<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\ContactType;
use AppBundle\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        return $this->render('::home.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        $formContact = $this->createForm(ContactType::class);


        return $this->render('::contact.html.twig', array(
            'formContact' => $formContact->createView()
        ));

    }

    /**
     * @Route("/mentions_legales", name="mentions_legales")
     */
    public function mentionsLegalesAction()
    {
        return $this->render('mentions_legales.html.twig');
    }

}
