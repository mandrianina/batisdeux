<?php

namespace Batis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="Batis\UserBundle\Repository\TypeRepository")
 */
class Type
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
     * @ORM\Column(name="type_utilisateur", type="string", length=255, unique=true)
     */
    private $typeUtilisateur;

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
     * Set typeUtilisateur
     *
     * @param string $typeUtilisateur
     * @return Type
     */
    public function setTypeUtilisateur($typeUtilisateur)
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    /**
     * Get typeUtilisateur
     *
     * @return string 
     */
    public function getTypeUtilisateur()
    {
        return $this->typeUtilisateur;
    }
}
