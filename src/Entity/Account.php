<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="account")
 * @ORM\Entity()
 */
class Account
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_confirmed;

    /**
     * @ORM\Column(type="string")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string")
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone_number;

    /**
     * @ORM\OneToOne(targetEntity="User")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="Profile")
     */
    private $profile;

    /**
     * @ORM\OneToMany(targetEntity="Order", mappedBy="account")
     */
    private $orders;

    /**
     * @ORM\OneToOne(targetEntity="Genblueprint")
     */
    private $genblueprint;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $free;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $agree;

    public function __construct(){
        $this->date_created = new \DateTime();
    }

    /**
     * $param array $values
     */
    public function edit($values)
    {
        if (isset($values['first_name'])) {
            $this->setFirstName($values['first_name']);
        }
        if (isset($values['last_name'])) {
            $this->setLastName($values['last_name']);
        }
        if (isset($values['address'])) {
            $this->setAddress($values['address']);
        }
        if (isset($values['postcode'])) {
            $this->setPostcode($values['postcode']);
        }
        if (isset($values['city'])) {
            $this->setCity($values['city']);
        }
        if (isset($values['date_of_birth'])) {
            $this->setDateOfBirth(new \DateTime($values['date_of_birth']));
        }
        if (isset($values['phone_number'])) {
            $this->setPhoneNumber($values['phone_number']);
        }
        if (isset($values['agree'])) {
            $this->setAgree($values['agree']);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDateCreated()
    {
        if (!is_null($this->date_created)) {
            return $this->date_created->format('Y-m-d H:i:s');
        }
        return $this->date_created;
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    public function getDateConfirmed()
    {
        if (!is_null($this->date_confirmed)) {
            return $this->date_confirmed->format('Y-m-d H:i:s');
        }
        return $this->date_confirmed;
    }

    public function setDateConfirmed($date_confirmed)
    {
        $this->date_confirmed = $date_confirmed;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getDateOfBirth()
    {
        if (!is_null($this->date_of_birth)) {
            return $this->date_of_birth->format('Y-m-d');
        }
        return $this->date_of_birth;
    }

    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    public function getFullName()
    {
        $full_name = $this->getFirstName();
        $full_name .= " " . $this->getLastName();
        return $full_name;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    public function getGenblueprint()
    {
        return $this->genblueprint;
    }

    public function setGenblueprint($genblueprint)
    {
        $this->genblueprint = $genblueprint;
    }

    public function getFree()
    {
        return $this->free;
    }

    public function setFree($free)
    {
        $this->free = $free;
    }

    public function toggleFree()
    {
        $this->free = $this->free ? false : true;
    }

    public function getAgree()
    {
        return $this->agree;
    }

    public function setAgree($agree): void
    {
        $this->agree = $agree;
    }
}
