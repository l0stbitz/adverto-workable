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
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="abv", type="string", length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $abv;

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
     * Set id
     *
     * @param integer $id
     *
     * @return Country
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set abv
     *
     * @param string $abv
     *
     * @return Country
     */
    public function setAbv($abv)
    {
        $this->abv = $abv;

        return $this;
    }

    /**
     * Get abv
     *
     * @return string
     */
    public function getAbv()
    {
        return $this->abv;
    }
}
