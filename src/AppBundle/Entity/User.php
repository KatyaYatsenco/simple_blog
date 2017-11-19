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

    /**
     * @var Chat
     * Many Users have Many Chats.
     * @ORM\ManyToMany(targetEntity="Chat")
     * @ORM\JoinTable(name="users_chats",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="chat_id", referencedColumnName="id")}
     *      )
     */
    private $chats;

    /**
     * @var ArrayCollection
     *
     * Many Users have Many UserGroups.
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     */
    private $user_groups;

    /**
     * Many Users have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;
    /**
     * Many Users have many Users.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;

    public function __construct()
    {
        $this->phoneNumbers = new ArrayCollection();
        $this->chats = new ArrayCollection();
        $this->user_groups = new ArrayCollection();
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * @return mixed
     */
    public function getMyFriends()
    {
        return $this->myFriends;
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

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @return Pet
     */
    public function getPet(): Pet
    {
        return $this->pet;
    }

    /**
     * @return int
     */
    public function getPhoneNumbers(): int
    {
        return $this->phoneNumbers;
    }

    /**
     * @return Chat
     */
    public function getChats(): Chat
    {
        return $this->chats;
    }

    /**
     * @return ArrayCollection
     */
    public function getUserGroups(): ArrayCollection
    {
        return $this->user_groups;
    }
}
