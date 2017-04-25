<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feed
 *
 * @ORM\Table(name="advj_feeds")
 * @ORM\Entity
 */
class Feed
{
    /**
     * @var string
     *
     * @ORM\Column(name="feed_name", type="string", length=100, nullable=true)
     */
    private $feedName;

    /**
     * @var string
     *
     * @ORM\Column(name="feed_file_name", type="string", length=100, nullable=true)
     */
    private $feedFileName;

    /**
     * @var string
     *
     * @ORM\Column(name="feed_url_configuration", type="string", length=25, nullable=false)
     */
    private $feedUrlConfiguration;

    /**
     * @var integer
     *
     * @ORM\Column(name="feed_user_modified", type="bigint", nullable=true)
     */
    private $feedUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="feed_date_modified", type="datetime", nullable=true)
     */
    private $feedDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="feed_position", type="bigint", nullable=true)
     */
    private $feedPosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="feed_active", type="boolean", nullable=true)
     */
    private $feedActive = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="feed_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $feedId;



    /**
     * Set feedName
     *
     * @param string $feedName
     *
     * @return Feed
     */
    public function setFeedName($feedName)
    {
        $this->feedName = $feedName;

        return $this;
    }

    /**
     * Get feedName
     *
     * @return string
     */
    public function getFeedName()
    {
        return $this->feedName;
    }

    /**
     * Set feedFileName
     *
     * @param string $feedFileName
     *
     * @return Feed
     */
    public function setFeedFileName($feedFileName)
    {
        $this->feedFileName = $feedFileName;

        return $this;
    }

    /**
     * Get feedFileName
     *
     * @return string
     */
    public function getFeedFileName()
    {
        return $this->feedFileName;
    }

    /**
     * Set feedUrlConfiguration
     *
     * @param string $feedUrlConfiguration
     *
     * @return Feed
     */
    public function setFeedUrlConfiguration($feedUrlConfiguration)
    {
        $this->feedUrlConfiguration = $feedUrlConfiguration;

        return $this;
    }

    /**
     * Get feedUrlConfiguration
     *
     * @return string
     */
    public function getFeedUrlConfiguration()
    {
        return $this->feedUrlConfiguration;
    }

    /**
     * Set feedUserModified
     *
     * @param integer $feedUserModified
     *
     * @return Feed
     */
    public function setFeedUserModified($feedUserModified)
    {
        $this->feedUserModified = $feedUserModified;

        return $this;
    }

    /**
     * Get feedUserModified
     *
     * @return integer
     */
    public function getFeedUserModified()
    {
        return $this->feedUserModified;
    }

    /**
     * Set feedDateModified
     *
     * @param \DateTime $feedDateModified
     *
     * @return Feed
     */
    public function setFeedDateModified($feedDateModified)
    {
        $this->feedDateModified = $feedDateModified;

        return $this;
    }

    /**
     * Get feedDateModified
     *
     * @return \DateTime
     */
    public function getFeedDateModified()
    {
        return $this->feedDateModified;
    }

    /**
     * Set feedPosition
     *
     * @param integer $feedPosition
     *
     * @return Feed
     */
    public function setFeedPosition($feedPosition)
    {
        $this->feedPosition = $feedPosition;

        return $this;
    }

    /**
     * Get feedPosition
     *
     * @return integer
     */
    public function getFeedPosition()
    {
        return $this->feedPosition;
    }

    /**
     * Set feedActive
     *
     * @param boolean $feedActive
     *
     * @return Feed
     */
    public function setFeedActive($feedActive)
    {
        $this->feedActive = $feedActive;

        return $this;
    }

    /**
     * Get feedActive
     *
     * @return boolean
     */
    public function getFeedActive()
    {
        return $this->feedActive;
    }

    /**
     * Get feedId
     *
     * @return integer
     */
    public function getFeedId()
    {
        return $this->feedId;
    }
}
