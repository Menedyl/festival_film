<?php

namespace AppBundle\Services;

use AppBundle\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;

class FilmManager
{

    private $em;


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function add(Film $film)
    {

        $this->em->persist($film);
        $this->em->flush();

    }

    public function update(Film $film, $nbRegistration)
    {

        $film->addRegistered($nbRegistration);

        $this->em->persist($film);
        $this->em->flush();


    }

}