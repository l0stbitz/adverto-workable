<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageImage
 *
 * @ORM\Table(name="adv_page_image")
 * @ORM\Entity
 */
class PageImage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="page_id", type="bigint", nullable=false)
     */
    private $pageId;

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
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return AdvPagesImages
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return AdvPagesImages
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
     * @return AdvPagesImages
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
     * @return AdvPagesImages
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
