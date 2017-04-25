<?php

namespace erto\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocialMedia
 *
 * @ORM\Table(name="adv_social_media")
 * @ORM\Entity
 */
class SocialMedia
{
    /**
     * @var string
     *
     * @ORM\Column(name="social_title", type="string", length=255, nullable=false)
     */
    private $socialTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="social_slug", type="string", length=255, nullable=false)
     */
    private $socialSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="social_url", type="string", length=255, nullable=false)
     */
    private $socialUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="social_status", type="bigint", nullable=false)
     */
    private $socialStatus = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="social_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $socialId;



    /**
     * Set socialTitle
     *
     * @param string $socialTitle
     *
     * @return SocialMedia
     */
    public function setSocialTitle($socialTitle)
    {
        $this->socialTitle = $socialTitle;

        return $this;
    }

    /**
     * Get socialTitle
     *
     * @return string
     */
    public function getSocialTitle()
    {
        return $this->socialTitle;
    }

    /**
     * Set socialSlug
     *
     * @param string $socialSlug
     *
     * @return SocialMedia
     */
    public function setSocialSlug($socialSlug)
    {
        $this->socialSlug = $socialSlug;

        return $this;
    }

    /**
     * Get socialSlug
     *
     * @return string
     */
    public function getSocialSlug()
    {
        return $this->socialSlug;
    }

    /**
     * Set socialUrl
     *
     * @param string $socialUrl
     *
     * @return SocialMedia
     */
    public function setSocialUrl($socialUrl)
    {
        $this->socialUrl = $socialUrl;

        return $this;
    }

    /**
     * Get socialUrl
     *
     * @return string
     */
    public function getSocialUrl()
    {
        return $this->socialUrl;
    }

    /**
     * Set socialStatus
     *
     * @param integer $socialStatus
     *
     * @return SocialMedia
     */
    public function setSocialStatus($socialStatus)
    {
        $this->socialStatus = $socialStatus;

        return $this;
    }

    /**
     * Get socialStatus
     *
     * @return integer
     */
    public function getSocialStatus()
    {
        return $this->socialStatus;
    }

    /**
     * Get socialId
     *
     * @return integer
     */
    public function getSocialId()
    {
        return $this->socialId;
    }
}
