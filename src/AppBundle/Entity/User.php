<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name",type="string",length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $posts;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Photo")
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    private $photo;

    /**
     * @var Pet
     * @ORM\OneToOne(targetEntity="Pet", mappedBy="user")
     */
    private $pet;

    /**
     * @var int
     * @ORM\ManyToMany(targetEntity="PhoneNumber")
     * @ORM\JoinTable(name="users_phone_numbers",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="phone_number_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $phoneNumbers;

    public function __construct()
    {
        $this->phoneNumbers = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
