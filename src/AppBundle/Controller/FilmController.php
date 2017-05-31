<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
use AppBundle\Form\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends Controller
{

    /**
     * @Route("/film_add", name="film_add")
     */
    public function addAction(Request $request)
    {

        /** @var Film $film */
        $film = new Film();

        /** @var Form $form */
        $form = $this->createForm(FilmType::class, $film);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->get('app.film_manager')->add($film);

            $this->addFlash('info', 'Film ajouté');

            return $this->render('film/film_add.html.twig', array(
                'form' => $form->createView()
            ));

        }

        return $this->render('film/film_add.html.twig', array(
                'form' => $form->createView())
        );

    }

    /**
     * @Route("/films", name="films")
     */
    public function filmsAction()
    {
        $currentDate = new \DateTime();

        $films = $this->getDoctrine()->getRepository('AppBundle:Film')->findAll();

        return $this->render('film/films.html.twig', array(
            'films' => $films,
            'currentDate' => $currentDate
        ));
    }

    /**
     * @Route("/registration/{id}", name="film_registration", requirements={"id" : "\d+"})
     */
    public function registerAction(Request $request, Film $film)
    {
        $formRegistration = $this->createForm(RegisterType::class);

        $formRegistration->handleRequest($request);

        if ($formRegistration->isSubmitted() && $formRegistration->isValid()){

            $nbRegistration = $formRegistration->get('registration')->getData();

            $this->get('app.film_manager')->update($film, $nbRegistration);

            $this->addFlash('info', 'Votre inscription a bien été pris en compte.');

            return $this->redirectToRoute('films');
        }

        return $this->render('film/film_registration.html.twig', array(
            'formRegistration' => $formRegistration->createView(),
            'film' => $film
        ));
    }

}
