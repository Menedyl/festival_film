<?php

namespace AppBundle\Services;


use AppBundle\Entity\News;
use Doctrine\ORM\EntityManagerInterface;

class NewsManager
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function add(News $news)
    {
        $this->em->persist($news);
        $this->em->flush();

    }
}