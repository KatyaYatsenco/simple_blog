<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pet
 *
 * @ORM\Table(name="pet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PetRepository")
 */
class Pet
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="smallint")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="species", type="string", length=255)
     */
    private $species;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="User", inversedBy="pet")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Pet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return Pet
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get species
     *
     * @return string
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Set species
     *
     * @param string $species
     *
     * @return Pet
     */
    public function setSpecies($species)
    {
        $this->species = $species;

        return $this;
    }
}

