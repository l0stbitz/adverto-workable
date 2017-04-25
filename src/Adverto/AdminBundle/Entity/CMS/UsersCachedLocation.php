<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersCachedLocation
 *
 * @ORM\Table(name="users_cached_location")
 * @ORM\Entity
 */
class UsersCachedLocation
{
    /**
     * @var string
     *
     * @ORM\Column(name="location_address", type="string", length=255, nullable=true)
     */
    private $locationAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=50, nullable=true)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="string", length=50, nullable=true)
     */
    private $lng;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;



    /**
     * Set locationAddress
     *
     * @param string $locationAddress
     *
     * @return UsersCachedLocation
     */
    public function setLocationAddress($locationAddress)
    {
        $this->locationAddress = $locationAddress;

        return $this;
    }

    /**
     * Get locationAddress
     *
     * @return string
     */
    public function getLocationAddress()
    {
        return $this->locationAddress;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return UsersCachedLocation
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
     * @return UsersCachedLocation
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
     * Get locationId
     *
     * @return integer
     */
    public function getLocationId()
    {
        return $this->locationId;
    }
}
