<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeatureImage
 *
 * @ORM\Table(name="adv_feature_image")
 * @ORM\Entity
 */
class AdvFeaturesImages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="feature_id", type="bigint", nullable=false)
     */
    private $featureId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="bigint", nullable=false)
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_id", type="bigint", nullable=false)
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imageId;



    /**
     * Set featureId
     *
     * @param integer $featureId
     *
     * @return AdvFeaturesImages
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
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return AdvFeaturesImages
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
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return AdvFeaturesImages
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return AdvFeaturesImages
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get imageId
     *
     * @return integer
     */
    public function getImageId()
    {
        return $this->imageId;
    }
}
