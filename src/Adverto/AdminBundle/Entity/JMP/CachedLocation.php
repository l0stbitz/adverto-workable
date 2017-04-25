<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * CachedLocation
 *
 * @ORM\Table(name="advj_cached_locations")
 * @ORM\Entity
 */
class CachedLocation
{
    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_street", type="string", length=100, nullable=true)
     */
    private $cachedLocationStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_city", type="string", length=50, nullable=true)
     */
    private $cachedLocationCity;

    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_state", type="string", length=50, nullable=true)
     */
    private $cachedLocationState;

    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_zip_code", type="string", length=10, nullable=true)
     */
    private $cachedLocationZipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_country", type="string", length=5, nullable=true)
     */
    private $cachedLocationCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_lat", type="string", length=50, nullable=true)
     */
    private $cachedLocationLat;

    /**
     * @var string
     *
     * @ORM\Column(name="cached_location_lng", type="string", length=50, nullable=true)
     */
    private $cachedLocationLng;

    /**
     * @var integer
     *
     * @ORM\Column(name="cached_location_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cachedLocationId;



    /**
     * Set cachedLocationStreet
     *
     * @param string $cachedLocationStreet
     *
     * @return CachedLocation
     */
    public function setCachedLocationStreet($cachedLocationStreet)
    {
        $this->cachedLocationStreet = $cachedLocationStreet;

        return $this;
    }

    /**
     * Get cachedLocationStreet
     *
     * @return string
     */
    public function getCachedLocationStreet()
    {
        return $this->cachedLocationStreet;
    }

    /**
     * Set cachedLocationCity
     *
     * @param string $cachedLocationCity
     *
     * @return CachedLocation
     */
    public function setCachedLocationCity($cachedLocationCity)
    {
        $this->cachedLocationCity = $cachedLocationCity;

        return $this;
    }

    /**
     * Get cachedLocationCity
     *
     * @return string
     */
    public function getCachedLocationCity()
    {
        return $this->cachedLocationCity;
    }

    /**
     * Set cachedLocationState
     *
     * @param string $cachedLocationState
     *
     * @return CachedLocation
     */
    public function setCachedLocationState($cachedLocationState)
    {
        $this->cachedLocationState = $cachedLocationState;

        return $this;
    }

    /**
     * Get cachedLocationState
     *
     * @return string
     */
    public function getCachedLocationState()
    {
        return $this->cachedLocationState;
    }

    /**
     * Set cachedLocationZipCode
     *
     * @param string $cachedLocationZipCode
     *
     * @return CachedLocation
     */
    public function setCachedLocationZipCode($cachedLocationZipCode)
    {
        $this->cachedLocationZipCode = $cachedLocationZipCode;

        return $this;
    }

    /**
     * Get cachedLocationZipCode
     *
     * @return string
     */
    public function getCachedLocationZipCode()
    {
        return $this->cachedLocationZipCode;
    }

    /**
     * Set cachedLocationCountry
     *
     * @param string $cachedLocationCountry
     *
     * @return CachedLocation
     */
    public function setCachedLocationCountry($cachedLocationCountry)
    {
        $this->cachedLocationCountry = $cachedLocationCountry;

        return $this;
    }

    /**
     * Get cachedLocationCountry
     *
     * @return string
     */
    public function getCachedLocationCountry()
    {
        return $this->cachedLocationCountry;
    }

    /**
     * Set cachedLocationLat
     *
     * @param string $cachedLocationLat
     *
     * @return CachedLocation
     */
    public function setCachedLocationLat($cachedLocationLat)
    {
        $this->cachedLocationLat = $cachedLocationLat;

        return $this;
    }

    /**
     * Get cachedLocationLat
     *
     * @return string
     */
    public function getCachedLocationLat()
    {
        return $this->cachedLocationLat;
    }

    /**
     * Set cachedLocationLng
     *
     * @param string $cachedLocationLng
     *
     * @return CachedLocation
     */
    public function setCachedLocationLng($cachedLocationLng)
    {
        $this->cachedLocationLng = $cachedLocationLng;

        return $this;
    }

    /**
     * Get cachedLocationLng
     *
     * @return string
     */
    public function getCachedLocationLng()
    {
        return $this->cachedLocationLng;
    }

    /**
     * Get cachedLocationId
     *
     * @return integer
     */
    public function getCachedLocationId()
    {
        return $this->cachedLocationId;
    }
}
