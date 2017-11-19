<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
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
     * @var int
     *
     * @ORM\Column(name="age", type="smallint")
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="bigNumber", type="bigint")
     */
    private $bigNumber;

    /**
     * @var bool
     *
     * @ORM\Column(name="honesty", type="boolean")
     */
    private $honesty;

    /**
     * @var string
     *
     * @ORM\Column(name="justDesimalExample", type="decimal", precision=10, scale=0)
     */
    private $justDesimalExample;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="objectExample", type="object")
     */
    private $objectExample;

    /**
     * @var array
     *
     * @ORM\Column(name="qualities", type="array")
     */
    private $qualities;

    /**
     * @var array
     *
     * @ORM\Column(name="skills", type="simple_array")
     */
    private $skills;

    /**
     * @var array
     *
     * @ORM\Column(name="photos", type="json_array")
     */
    private $photos;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float")
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="uniqIdForDb", type="guid")
     */
    private $uniqIdForDb;

    /**
     * @var string
     *
     * @ORM\Column(name="binaryStringWithoutMaximumLength", type="blob")
     */
    private $binaryStringWithoutMaximumLength;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fullDateObject", type="datetime")
     */
    private $fullDateObject;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="time")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateWithTimeZone", type="datetimetz")
     */
    private $dateWithTimeZone;

    /**
     * @var string
     *
     * @ORM\Column(name="aboutMe", type="text")
     */
    private $aboutMe;

    /**
     * One Student has One Student.
     * @ORM\OneToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="mentor_id", referencedColumnName="id")
     */
    private $mentor;

    /**
     * @return mixed
     */
    public function getMentor()
    {
        return $this->mentor;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Student
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Student
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get bigNumber
     *
     * @return int
     */
    public function getBigNumber()
    {
        return $this->bigNumber;
    }

    /**
     * Set bigNumber
     *
     * @param integer $bigNumber
     *
     * @return Student
     */
    public function setBigNumber($bigNumber)
    {
        $this->bigNumber = $bigNumber;

        return $this;
    }

    /**
     * Get honesty
     *
     * @return bool
     */
    public function getHonesty()
    {
        return $this->honesty;
    }

    /**
     * Set honesty
     *
     * @param boolean $honesty
     *
     * @return Student
     */
    public function setHonesty($honesty)
    {
        $this->honesty = $honesty;

        return $this;
    }

    /**
     * Get justDesimalExample
     *
     * @return string
     */
    public function getJustDesimalExample()
    {
        return $this->justDesimalExample;
    }

    /**
     * Set justDesimalExample
     *
     * @param string $justDesimalExample
     *
     * @return Student
     */
    public function setJustDesimalExample($justDesimalExample)
    {
        $this->justDesimalExample = $justDesimalExample;

        return $this;
    }

    /**
     * Get objectExample
     *
     * @return \stdClass
     */
    public function getObjectExample()
    {
        return $this->objectExample;
    }

    /**
     * Set objectExample
     *
     * @param \stdClass $objectExample
     *
     * @return Student
     */
    public function setObjectExample($objectExample)
    {
        $this->objectExample = $objectExample;

        return $this;
    }

    /**
     * Get qualities
     *
     * @return array
     */
    public function getQualities()
    {
        return $this->qualities;
    }

    /**
     * Set qualities
     *
     * @param array $qualities
     *
     * @return Student
     */
    public function setQualities($qualities)
    {
        $this->qualities = $qualities;

        return $this;
    }

    /**
     * Get skills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set skills
     *
     * @param array $skills
     *
     * @return Student
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get photos
     *
     * @return array
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set photos
     *
     * @param array $photos
     *
     * @return Student
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return Student
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get uniqIdForDb
     *
     * @return string
     */
    public function getUniqIdForDb(): string
    {
        return $this->uniqIdForDb;
    }

    /**
     * Get binaryStringWithoutMaximumLength
     *
     * @return string
     */
    public function getBinaryStringWithoutMaximumLength()
    {
        return $this->binaryStringWithoutMaximumLength;
    }

    /**
     * Set binaryStringWithoutMaximumLength
     *
     * @param string $binaryStringWithoutMaximumLength
     *
     * @return Student
     */
    public function setBinaryStringWithoutMaximumLength($binaryStringWithoutMaximumLength)
    {
        $this->binaryStringWithoutMaximumLength = $binaryStringWithoutMaximumLength;

        return $this;
    }

    /**
     * Get fullDateObject
     *
     * @return \DateTime
     */
    public function getFullDateObject()
    {
        return $this->fullDateObject;
    }

    /**
     * Set fullDateObject
     *
     * @param \DateTime $fullDateObject
     *
     * @return Student
     */
    public function setFullDateObject($fullDateObject)
    {
        $this->fullDateObject = $fullDateObject;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Student
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get dateWithTimeZone
     *
     * @return \DateTime
     */
    public function getDateWithTimeZone()
    {
        return $this->dateWithTimeZone;
    }

    /**
     * Set dateWithTimeZone
     *
     * @param \DateTime $dateWithTimeZone
     *
     * @return Student
     */
    public function setDateWithTimeZone($dateWithTimeZone)
    {
        $this->dateWithTimeZone = $dateWithTimeZone;

        return $this;
    }

    /**
     * Get aboutMe
     *
     * @return string
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * Set aboutMe
     *
     * @param string $aboutMe
     *
     * @return Student
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;

        return $this;
    }

    /**
     * Get another
     *
     * @return string
     */
    public function getAnother()
    {
        return $this->another;
    }
}

