<?php

namespace AppBundle\Controller;


use AppBundle\Entity\News;
use AppBundle\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends Controller
{

    /**
     * @Route("/news_list", name="news_list")
     */
    public function listAction()
    {
        $newsList = $this->getDoctrine()->getRepository('AppBundle:News')->findAll();


        return $this->render('news/news_list.html.twig', array(
            'newsList' => $newsList
        ));

    }

    public function panelAction()
    {
        $newsList = $this->getDoctrine()->getRepository('AppBundle:News')->findAll();

        return $this->render('news/news_panel.html.twig', array(
            'newsList' => $newsList
        ));
    }

    /**
     * @Route("/news_add" , name="news_add")
     */
    public function addAction(Request $request)
    {
        $news = new News();

        $formNews = $this->createForm(NewsType::class, $news);

        $formNews->handleRequest($request);

        if ($formNews->isSubmitted() && $formNews->isValid()) {

            $this->get('app.news_manager')->add($news);

            $this->addFlash('info', 'Votre annonce à bien été publié.');

            return $this->redirectToRoute('news_add');

        }

        return $this->render('news/news_add.html.twig', array(
            'formNews' => $formNews->createView()
        ));


    }

}