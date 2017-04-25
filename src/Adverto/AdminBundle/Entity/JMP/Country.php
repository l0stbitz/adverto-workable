<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="advj_countries")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=50, nullable=true)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="continent_name", type="string", length=255, nullable=true)
     */
    private $continentName;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="country_abv", type="string", length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $countryAbv;

    /**
     * Set countryName
     *
     * @param string $countryName
     *
     * @return Country
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * Get countryName
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * Set continentName
     *
     * @param string $continentName
     *
     * @return Country
     */
    public function setContinentName($continentName)
    {
        $this->continentName = $continentName;

        return $this;
    }

    /**
     * Get continentName
     *
     * @return string
     */
    public function getContinentName()
    {
        return $this->continentName;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     *
     * @return Country
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
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

    /**
     * Set countryAbv
     *
     * @param string $countryAbv
     *
     * @return Country
     */
    public function setCountryAbv($countryAbv)
    {
        $this->countryAbv = $countryAbv;

        return $this;
    }

    /**
     * Get countryAbv
     *
     * @return string
     */
    public function getCountryAbv()
    {
        return $this->countryAbv;
    }
}
