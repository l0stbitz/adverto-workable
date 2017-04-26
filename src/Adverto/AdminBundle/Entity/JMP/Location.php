<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="advj_locations")
 * @ORM\Entity
 */
class Location
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="street_address", type="string", length=100, nullable=true)
     */
    private $streetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city = '';

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=50, nullable=false)
     */
    private $state = '';

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=10, nullable=false)
     */
    private $zipCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=5, nullable=false)
     */
    private $country = '';

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=50, nullable=false)
     */
    private $lat = '';

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="string", length=50, nullable=false)
     */
    private $lng = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="user_modified", type="bigint", nullable=true)
     */
    private $userModified;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_modified", type="integer", nullable=true)
     */
    private $dateModified = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="bigint", nullable=true)
     */
    private $position;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="editable", type="boolean", nullable=true)
     */
    private $editable = 0;
    
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
     * Set name
     *
     * @param string $name
     *
     * @return Location
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Location
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     *
     * @return Location
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Location
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Location
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Location
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

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Location
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     *
     * @return Location
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set userModified
     *
     * @param integer $userModified
     *
     * @return Location
     */
    public function setUserModified($userModified)
    {
        $this->userModified = $userModified;

        return $this;
    }

    /**
     * Get userModified
     *
     * @return integer
     */
    public function getUserModified()
    {
        return $this->userModified;
    }

    /**
     * Set dateModified
     *
     * @param integer $dateModified
     *
     * @return Location
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return integer
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Location
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Location
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set editable
     *
     * @param boolean $editable
     *
     * @return Location
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * Get editable
     *
     * @return boolean
     */
    public function getEditable()
    {
        return $this->editable;
    }
    
    public function __toString() {
        return $this->getName();
    }    
}
