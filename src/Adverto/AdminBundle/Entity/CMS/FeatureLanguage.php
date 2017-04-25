<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeatureLanguage
 *
 * @ORM\Table(name="adv_feature_language")
 * @ORM\Entity
 */
class FeatureLanguage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="bigint", nullable=false)
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="feature_id", type="bigint", nullable=false)
     */
    private $featureId;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_title", type="text", length=16777215, nullable=false)
     */
    private $featureTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_name", type="text", length=16777215, nullable=false)
     */
    private $featureName;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_video", type="text", length=65535, nullable=true)
     */
    private $featureVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="video_type", type="string", length=255, nullable=true)
     */
    private $videoType;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_type", type="string", length=255, nullable=true)
     */
    private $featureType;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_description", type="text", length=16777215, nullable=false)
     */
    private $featureDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_btn_title", type="string", length=255, nullable=false)
     */
    private $featureBtnTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_btn_link", type="string", length=255, nullable=false)
     */
    private $featureBtnLink;

    /**
     * @var string
     *
     * @ORM\Column(name="feature_date", type="string", length=255, nullable=false)
     */
    private $featureDate;

    /**
     * @var string
     *
     * @ORM\Column(name="modified", type="string", length=255, nullable=false)
     */
    private $modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return AdvFeaturesLanguages
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set featureId
     *
     * @param integer $featureId
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureId($featureId)
    {
        $this->featureId = $featureId;

        return $this;
    }

    /**
     * Get featureId
     *
     * @return integer
     */
    public function getFeatureId()
    {
        return $this->featureId;
    }

    /**
     * Set featureTitle
     *
     * @param string $featureTitle
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureTitle($featureTitle)
    {
        $this->featureTitle = $featureTitle;

        return $this;
    }

    /**
     * Get featureTitle
     *
     * @return string
     */
    public function getFeatureTitle()
    {
        return $this->featureTitle;
    }

    /**
     * Set featureName
     *
     * @param string $featureName
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureName($featureName)
    {
        $this->featureName = $featureName;

        return $this;
    }

    /**
     * Get featureName
     *
     * @return string
     */
    public function getFeatureName()
    {
        return $this->featureName;
    }

    /**
     * Set featureVideo
     *
     * @param string $featureVideo
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureVideo($featureVideo)
    {
        $this->featureVideo = $featureVideo;

        return $this;
    }

    /**
     * Get featureVideo
     *
     * @return string
     */
    public function getFeatureVideo()
    {
        return $this->featureVideo;
    }

    /**
     * Set videoType
     *
     * @param string $videoType
     *
     * @return AdvFeaturesLanguages
     */
    public function setVideoType($videoType)
    {
        $this->videoType = $videoType;

        return $this;
    }

    /**
     * Get videoType
     *
     * @return string
     */
    public function getVideoType()
    {
        return $this->videoType;
    }

    /**
     * Set featureType
     *
     * @param string $featureType
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureType($featureType)
    {
        $this->featureType = $featureType;

        return $this;
    }

    /**
     * Get featureType
     *
     * @return string
     */
    public function getFeatureType()
    {
        return $this->featureType;
    }

    /**
     * Set featureDescription
     *
     * @param string $featureDescription
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureDescription($featureDescription)
    {
        $this->featureDescription = $featureDescription;

        return $this;
    }

    /**
     * Get featureDescription
     *
     * @return string
     */
    public function getFeatureDescription()
    {
        return $this->featureDescription;
    }

    /**
     * Set featureBtnTitle
     *
     * @param string $featureBtnTitle
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureBtnTitle($featureBtnTitle)
    {
        $this->featureBtnTitle = $featureBtnTitle;

        return $this;
    }

    /**
     * Get featureBtnTitle
     *
     * @return string
     */
    public function getFeatureBtnTitle()
    {
        return $this->featureBtnTitle;
    }

    /**
     * Set featureBtnLink
     *
     * @param string $featureBtnLink
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureBtnLink($featureBtnLink)
    {
        $this->featureBtnLink = $featureBtnLink;

        return $this;
    }

    /**
     * Get featureBtnLink
     *
     * @return string
     */
    public function getFeatureBtnLink()
    {
        return $this->featureBtnLink;
    }

    /**
     * Set featureDate
     *
     * @param string $featureDate
     *
     * @return AdvFeaturesLanguages
     */
    public function setFeatureDate($featureDate)
    {
        $this->featureDate = $featureDate;

        return $this;
    }

    /**
     * Get featureDate
     *
     * @return string
     */
    public function getFeatureDate()
    {
        return $this->featureDate;
    }

    /**
     * Set modified
     *
     * @param string $modified
     *
     * @return AdvFeaturesLanguages
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
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
}
