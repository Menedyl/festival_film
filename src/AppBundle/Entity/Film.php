<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diffusion", type="datetime")
     */
    private $diffusion;

    /**
     * @var int
     *
     * @ORM\Column(name="registered", type="integer")
     */
    private $registered;


    public function __construct()
    {

        $this->registered = 0;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set name
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get diffusion
     *
     * @return \DateTime
     */
    public function getDiffusion()
    {
        return $this->diffusion;
    }

    /**
     * Set diffusion
     *
     * @param \DateTime $diffusion
     */
    public function setDiffusion($diffusion)
    {
        $this->diffusion = $diffusion;
    }

    /**
     * Get registered
     *
     * @return int
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * Set registered
     *
     * @param integer $registered
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }

    public function addRegistered($nbRegistered)
    {
        $this->registered += $nbRegistered;
    }
}

