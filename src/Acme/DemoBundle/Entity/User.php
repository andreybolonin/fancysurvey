<?php

namespace Acme\DemoBundle\Entity;

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
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;

    /**
     * @ORM\Column(type="date")
     */
    protected $birthday;

    /**
     * @ORM\Column(type="integer")
     */
    protected $shoe_size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $ice_cream;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $car;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $book;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $country;

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
     * Set first_name
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set shoe_size
     *
     * @param integer $shoeSize
     * @return User
     */
    public function setShoeSize($shoeSize)
    {
        $this->shoe_size = $shoeSize;
    
        return $this;
    }

    /**
     * Get shoe_size
     *
     * @return integer 
     */
    public function getShoeSize()
    {
        return $this->shoe_size;
    }

    /**
     * Set ice_cream
     *
     * @param string $iceCream
     * @return User
     */
    public function setIceCream($iceCream)
    {
        $this->ice_cream = $iceCream;
    
        return $this;
    }

    /**
     * Get ice_cream
     *
     * @return string 
     */
    public function getIceCream()
    {
        return $this->ice_cream;
    }

    /**
     * Set car
     *
     * @param string $car
     * @return User
     */
    public function setCar($car)
    {
        $this->car = $car;
    
        return $this;
    }

    /**
     * Get car
     *
     * @return string 
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set book
     *
     * @param string $book
     * @return User
     */
    public function setBook($book)
    {
        $this->book = $book;
    
        return $this;
    }

    /**
     * Get book
     *
     * @return string 
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return User
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
}