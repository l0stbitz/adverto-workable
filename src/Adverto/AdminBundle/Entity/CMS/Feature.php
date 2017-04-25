<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 *
 * @ORM\Table(name="adv_feature")
 * @ORM\Entity
 */
class Feature
{
    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="bigint", nullable=false)
     */
    private $parentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="template_id", type="bigint", nullable=false)
     */
    private $templateId;

    /**
     * @var integer
     *
     * @ORM\Column(name="feature_position", type="integer", nullable=false)
     */
    private $featurePosition = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="feature_status", type="integer", nullable=false)
     */
    private $featureStatus = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return AdvFeatures
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return AdvFeatures
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set templateId
     *
     * @param integer $templateId
     *
     * @return AdvFeatures
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Get templateId
     *
     * @return integer
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Set featurePosition
     *
     * @param integer $featurePosition
     *
     * @return AdvFeatures
     */
    public function setFeaturePosition($featurePosition)
    {
        $this->featurePosition = $featurePosition;

        return $this;
    }

    /**
     * Get featurePosition
     *
     * @return integer
     */
    public function getFeaturePosition()
    {
        return $this->featurePosition;
    }

    /**
     * Set featureStatus
     *
     * @param integer $featureStatus
     *
     * @return AdvFeatures
     */
    public function setFeatureStatus($featureStatus)
    {
        $this->featureStatus = $featureStatus;

        return $this;
    }

    /**
     * Get featureStatus
     *
     * @return integer
     */
    public function getFeatureStatus()
    {
        return $this->featureStatus;
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
