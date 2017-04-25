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
     * @ORM\Column(name="location_name", type="string", length=100, nullable=true)
     */
    private $locationName;

    /**
     * @var string
     *
     * @ORM\Column(name="location_slug", type="string", length=100, nullable=true)
     */
    private $locationSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="location_street_address", type="string", length=100, nullable=true)
     */
    private $locationStreetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="location_city", type="string", length=50, nullable=false)
     */
    private $locationCity = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location_state", type="string", length=50, nullable=false)
     */
    private $locationState = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location_zip_code", type="string", length=10, nullable=false)
     */
    private $locationZipCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location_country", type="string", length=5, nullable=false)
     */
    private $locationCountry = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location_lat", type="string", length=50, nullable=false)
     */
    private $locationLat = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location_lng", type="string", length=50, nullable=false)
     */
    private $locationLng = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="location_user_modified", type="bigint", nullable=true)
     */
    private $locationUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="location_date_modified", type="datetime", nullable=true)
     */
    private $locationDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="location_position", type="bigint", nullable=true)
     */
    private $locationPosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="location_active", type="boolean", nullable=true)
     */
    private $locationActive = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="location_editable", type="boolean", nullable=true)
     */
    private $locationEditable = '0';

    /**
     * Set locationName
     *
     * @param string $locationName
     *
     * @return Location
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;
    }

    /**
     * Get locationName
     *
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Set locationSlug
     *
     * @param string $locationSlug
     *
     * @return Location
     */
    public function setLocationSlug($locationSlug)
    {
        $this->locationSlug = $locationSlug;

        return $this;
    }

    /**
     * Get locationSlug
     *
     * @return string
     */
    public function getLocationSlug()
    {
        return $this->locationSlug;
    }

    /**
     * Set locationStreetAddress
     *
     * @param string $locationStreetAddress
     *
     * @return Location
     */
    public function setLocationStreetAddress($locationStreetAddress)
    {
        $this->locationStreetAddress = $locationStreetAddress;

        return $this;
    }

    /**
     * Get locationStreetAddress
     *
     * @return string
     */
    public function getLocationStreetAddress()
    {
        return $this->locationStreetAddress;
    }

    /**
     * Set locationCity
     *
     * @param string $locationCity
     *
     * @return Location
     */
    public function setLocationCity($locationCity)
    {
        $this->locationCity = $locationCity;

        return $this;
    }

    /**
     * Get locationCity
     *
     * @return string
     */
    public function getLocationCity()
    {
        return $this->locationCity;
    }

    /**
     * Set locationState
     *
     * @param string $locationState
     *
     * @return Location
     */
    public function setLocationState($locationState)
    {
        $this->locationState = $locationState;

        return $this;
    }

    /**
     * Get locationState
     *
     * @return string
     */
    public function getLocationState()
    {
        return $this->locationState;
    }

    /**
     * Set locationZipCode
     *
     * @param string $locationZipCode
     *
     * @return Location
     */
    public function setLocationZipCode($locationZipCode)
    {
        $this->locationZipCode = $locationZipCode;

        return $this;
    }

    /**
     * Get locationZipCode
     *
     * @return string
     */
    public function getLocationZipCode()
    {
        return $this->locationZipCode;
    }

    /**
     * Set locationCountry
     *
     * @param string $locationCountry
     *
     * @return Location
     */
    public function setLocationCountry($locationCountry)
    {
        $this->locationCountry = $locationCountry;

        return $this;
    }

    /**
     * Get locationCountry
     *
     * @return string
     */
    public function getLocationCountry()
    {
        return $this->locationCountry;
    }

    /**
     * Set locationLat
     *
     * @param string $locationLat
     *
     * @return Location
     */
    public function setLocationLat($locationLat)
    {
        $this->locationLat = $locationLat;

        return $this;
    }

    /**
     * Get locationLat
     *
     * @return string
     */
    public function getLocationLat()
    {
        return $this->locationLat;
    }

    /**
     * Set locationLng
     *
     * @param string $locationLng
     *
     * @return Location
     */
    public function setLocationLng($locationLng)
    {
        $this->locationLng = $locationLng;

        return $this;
    }

    /**
     * Get locationLng
     *
     * @return string
     */
    public function getLocationLng()
    {
        return $this->locationLng;
    }

    /**
     * Set locationUserModified
     *
     * @param integer $locationUserModified
     *
     * @return Location
     */
    public function setLocationUserModified($locationUserModified)
    {
        $this->locationUserModified = $locationUserModified;

        return $this;
    }

    /**
     * Get locationUserModified
     *
     * @return integer
     */
    public function getLocationUserModified()
    {
        return $this->locationUserModified;
    }

    /**
     * Set locationDateModified
     *
     * @param \DateTime $locationDateModified
     *
     * @return Location
     */
    public function setLocationDateModified($locationDateModified)
    {
        $this->locationDateModified = $locationDateModified;

        return $this;
    }

    /**
     * Get locationDateModified
     *
     * @return \DateTime
     */
    public function getLocationDateModified()
    {
        return $this->locationDateModified;
    }

    /**
     * Set locationPosition
     *
     * @param integer $locationPosition
     *
     * @return Location
     */
    public function setLocationPosition($locationPosition)
    {
        $this->locationPosition = $locationPosition;

        return $this;
    }

    /**
     * Get locationPosition
     *
     * @return integer
     */
    public function getLocationPosition()
    {
        return $this->locationPosition;
    }

    /**
     * Set locationActive
     *
     * @param boolean $locationActive
     *
     * @return Location
     */
    public function setLocationActive($locationActive)
    {
        $this->locationActive = $locationActive;

        return $this;
    }

    /**
     * Get locationActive
     *
     * @return boolean
     */
    public function getLocationActive()
    {
        return $this->locationActive;
    }

    /**
     * Set locationEditable
     *
     * @param boolean $locationEditable
     *
     * @return Location
     */
    public function setLocationEditable($locationEditable)
    {
        $this->locationEditable = $locationEditable;

        return $this;
    }

    /**
     * Get locationEditable
     *
     * @return boolean
     */
    public function getLocationEditable()
    {
        return $this->locationEditable;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getLocationId()
    {
        return $this->id;
    }
}
