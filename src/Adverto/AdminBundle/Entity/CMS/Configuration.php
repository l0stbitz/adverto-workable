<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="adv_general_configuration")
 * @ORM\Entity
 */
class Configuration
{
    /**
     * @var string
     *
     * @ORM\Column(name="general_config_applicant_login", type="string", length=255, nullable=false)
     */
    private $generalConfigApplicantLogin;

    /**
     * @var integer
     *
     * @ORM\Column(name="general_config_applicant_login_status", type="integer", nullable=true)
     */
    private $generalConfigApplicantLoginStatus = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="general_config_copyrights", type="text", length=65535, nullable=false)
     */
    private $generalConfigCopyrights;

    /**
     * @var integer
     *
     * @ORM\Column(name="general_config_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $generalConfigId;



    /**
     * Set generalConfigApplicantLogin
     *
     * @param string $generalConfigApplicantLogin
     *
     * @return AdvGeneralConfiguration
     */
    public function setGeneralConfigApplicantLogin($generalConfigApplicantLogin)
    {
        $this->generalConfigApplicantLogin = $generalConfigApplicantLogin;

        return $this;
    }

    /**
     * Get generalConfigApplicantLogin
     *
     * @return string
     */
    public function getGeneralConfigApplicantLogin()
    {
        return $this->generalConfigApplicantLogin;
    }

    /**
     * Set generalConfigApplicantLoginStatus
     *
     * @param integer $generalConfigApplicantLoginStatus
     *
     * @return AdvGeneralConfiguration
     */
    public function setGeneralConfigApplicantLoginStatus($generalConfigApplicantLoginStatus)
    {
        $this->generalConfigApplicantLoginStatus = $generalConfigApplicantLoginStatus;

        return $this;
    }

    /**
     * Get generalConfigApplicantLoginStatus
     *
     * @return integer
     */
    public function getGeneralConfigApplicantLoginStatus()
    {
        return $this->generalConfigApplicantLoginStatus;
    }

    /**
     * Set generalConfigCopyrights
     *
     * @param string $generalConfigCopyrights
     *
     * @return AdvGeneralConfiguration
     */
    public function setGeneralConfigCopyrights($generalConfigCopyrights)
    {
        $this->generalConfigCopyrights = $generalConfigCopyrights;

        return $this;
    }

    /**
     * Get generalConfigCopyrights
     *
     * @return string
     */
    public function getGeneralConfigCopyrights()
    {
        return $this->generalConfigCopyrights;
    }

    /**
     * Get generalConfigId
     *
     * @return integer
     */
    public function getGeneralConfigId()
    {
        return $this->generalConfigId;
    }
}
