<?php

namespace Batis\CrowdsourcingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="Batis\CrowdsourcingBundle\Repository\ApplicationRepository")
 */
class Application
{

    /**
     * @ORM\ManyToOne(targetEntity="Batis\CrowdsourcingBundle\Entity\Job")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $job;

    /**
     * @ORM\ManyToOne(targetEntity="Batis\UserBundle\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $user;

    public function __construct()
    {
        $this->etat = "En attente";
    }
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="budget", type="integer")
     */
    private $budget;

    /**
     * @var int
     *
     * @ORM\Column(name="temps", type="integer")
     */
    private $temps;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50)
     */
    private $etat;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Application
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set job
     *
     * @param \Batis\CrowdsourcingBundle\Entity\Job $job
     * @return Application
     */
    public function setJob(\Batis\CrowdsourcingBundle\Entity\Job $job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \Batis\CrowdsourcingBundle\Entity\Job 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set user
     *
     * @param \Batis\UserBundle\Entity\User $user
     * @return Application
     */
    public function setUser(\Batis\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Batis\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set budget
     *
     * @param integer $budget
     * @return Application
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return integer 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set temps
     *
     * @param integer $temps
     * @return Application
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return integer 
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Application
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
