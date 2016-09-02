<?php

namespace Batis\CrowdsourcingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Job
 *
 * @ORM\Table(name="job")
 * @ORM\Entity(repositoryClass="Batis\CrowdsourcingBundle\Repository\JobRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Job
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\ManyToMany(targetEntity="Batis\CrowdsourcingBundle\Entity\Skill", cascade={"persist"})
     */
    private $skills;

    /**
     * @ORM\ManyToOne(targetEntity="Batis\CrowdsourcingBundle\Entity\Category")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="Batis\UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $user;

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="overview", type="string", length=65535, nullable=true)
     */
    private $overview;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_contributeur", type="integer", nullable=true)
     */
    private $nombre_contributeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=true)
     */
    private $expiresAt;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Batis\CrowdsourcingBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="budget_min", type="integer", nullable=true)
     */
    private $budget_min;

    /**
     * @var int
     *
     * @ORM\Column(name="budget_max", type="integer")
     */
    private $budget_max;

    

    /**
     * @var string
     *
     * @ORM\Column(name="about_job", type="string", length=65535, nullable=true)
     */
    private $about_job;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255), nullable=true)
     */
    private $token;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_public", type="boolean", nullable=true)
     */
    private $isPublic;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_activated", type="boolean")
     */
    private $isActivated = true;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;


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
     * Set type
     *
     * @param string $type
     * @return Job
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Job
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Job
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }


    /**
     * Set token
     *
     * @param string $token
     * @return Job
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set isPublic
     *
     * @param boolean $isPublic
     * @return Job
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * Get isPublic
     *
     * @return boolean 
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * Set isActivated
     *
     * @param boolean $isActivated
     * @return Job
     */
    public function setIsActivated($isActivated)
    {
        $this->isActivated = $isActivated;

        return $this;
    }

    /**
     * Get isActivated
     *
     * @return boolean 
     */
    public function getIsActivated()
    {
        return $this->isActivated;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     * @return Job
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Job
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Job
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set category
     *
     * @param \Batis\CrowdsourcingBundle\Entity\Category $category
     * @return Job
     */
    public function setCategory(\Batis\CrowdsourcingBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Batis\CrowdsourcingBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \Batis\UserBundle\Entity\User $user
     * @return Job
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
     * Set title
     *
     * @param string $title
     * @return Job
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set about_job
     *
     * @param string $aboutJob
     * @return Job
     */
    public function setAboutJob($aboutJob)
    {
        $this->about_job = $aboutJob;

        return $this;
    }

    /**
     * Get about_job
     *
     * @return string 
     */
    public function getAboutJob()
    {
        return $this->about_job;
    }

    /**
     * Set overview
     *
     * @param string $overview
     * @return Job
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get overview
     *
     * @return string 
     */
    public function getOverview()
    {
        return $this->overview;
    }


    /**
     * Set budget_min
     *
     * @param integer $budgetMin
     * @return Job
     */
    public function setBudgetMin($budgetMin)
    {
        $this->budget_min = $budgetMin;

        return $this;
    }

    /**
     * Get budget_min
     *
     * @return integer 
     */
    public function getBudgetMin()
    {
        return $this->budget_min;
    }

    /**
     * Set budget_max
     *
     * @param integer $budgetMax
     * @return Job
     */
    public function setBudgetMax($budgetMax)
    {
        $this->budget_max = $budgetMax;

        return $this;
    }

    /**
     * Get budget_max
     *
     * @return integer 
     */
    public function getBudgetMax()
    {
        return $this->budget_max;
    }

    /**
     * Set nombre_contributeur
     *
     * @param integer $nombreContributeur
     * @return Job
     */
    public function setNombreContributeur($nombreContributeur)
    {
        $this->nombre_contributeur = $nombreContributeur;

        return $this;
    }

    /**
     * Get nombre_contributeur
     *
     * @return integer 
     */
    public function getNombreContributeur()
    {
        return $this->nombre_contributeur;
    }

    /**
     * Set image
     *
     * @param \Batis\CrowdsourcingBundle\Entity\Image $image
     * @return Job
     */
    public function setImage(\Batis\CrowdsourcingBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Batis\CrowdsourcingBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
    

    /**
     * Add skills
     *
     * @param \Batis\CrowdsourcingBundle\Entity\Skill $skills
     * @return Job
     */
    public function addSkill(\Batis\CrowdsourcingBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \Batis\CrowdsourcingBundle\Entity\Skill $skills
     */
    public function removeSkill(\Batis\CrowdsourcingBundle\Entity\Skill $skills)
    {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
