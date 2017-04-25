<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="adv_page")
 * @ORM\Entity
 */
class Page
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
     * @ORM\Column(name="page_position", type="integer", nullable=false)
     */
    private $pagePosition = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="page_status", type="integer", nullable=false)
     */
    private $pageStatus = '0';

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
     * @return AdvPages
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
     * @return AdvPages
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
     * @return AdvPages
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
     * Set pagePosition
     *
     * @param integer $pagePosition
     *
     * @return AdvPages
     */
    public function setPagePosition($pagePosition)
    {
        $this->pagePosition = $pagePosition;

        return $this;
    }

    /**
     * Get pagePosition
     *
     * @return integer
     */
    public function getPagePosition()
    {
        return $this->pagePosition;
    }

    /**
     * Set pageStatus
     *
     * @param integer $pageStatus
     *
     * @return AdvPages
     */
    public function setPageStatus($pageStatus)
    {
        $this->pageStatus = $pageStatus;

        return $this;
    }

    /**
     * Get pageStatus
     *
     * @return integer
     */
    public function getPageStatus()
    {
        return $this->pageStatus;
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
