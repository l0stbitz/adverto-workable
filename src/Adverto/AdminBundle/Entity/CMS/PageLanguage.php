<?php

namespace Adverto\AdminBundle\Entity\CMS;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageLanguage
 *
 * @ORM\Table(name="adv_page_language")
 * @ORM\Entity
 */
class PageLanguage
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
     * @ORM\Column(name="page_id", type="bigint", nullable=false)
     */
    private $pageId;

    /**
     * @var string
     *
     * @ORM\Column(name="page_slug", type="string", length=255, nullable=false)
     */
    private $pageSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="page_name", type="string", length=255, nullable=false)
     */
    private $pageName;

    /**
     * @var string
     *
     * @ORM\Column(name="page_seo_title", type="string", length=255, nullable=false)
     */
    private $pageSeoTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="page_seo_description", type="text", length=16777215, nullable=false)
     */
    private $pageSeoDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="page_seo_keywords", type="text", length=16777215, nullable=false)
     */
    private $pageSeoKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="page_description", type="text", length=16777215, nullable=false)
     */
    private $pageDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="page_recipiant_emails", type="text", length=65535, nullable=false)
     */
    private $pageRecipiantEmails;

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
     * @return AdvPagesLanguages
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
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return AdvPagesLanguages
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
     * Set pageSlug
     *
     * @param string $pageSlug
     *
     * @return AdvPagesLanguages
     */
    public function setPageSlug($pageSlug)
    {
        $this->pageSlug = $pageSlug;

        return $this;
    }

    /**
     * Get pageSlug
     *
     * @return string
     */
    public function getPageSlug()
    {
        return $this->pageSlug;
    }

    /**
     * Set pageName
     *
     * @param string $pageName
     *
     * @return AdvPagesLanguages
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;

        return $this;
    }

    /**
     * Get pageName
     *
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * Set pageSeoTitle
     *
     * @param string $pageSeoTitle
     *
     * @return AdvPagesLanguages
     */
    public function setPageSeoTitle($pageSeoTitle)
    {
        $this->pageSeoTitle = $pageSeoTitle;

        return $this;
    }

    /**
     * Get pageSeoTitle
     *
     * @return string
     */
    public function getPageSeoTitle()
    {
        return $this->pageSeoTitle;
    }

    /**
     * Set pageSeoDescription
     *
     * @param string $pageSeoDescription
     *
     * @return AdvPagesLanguages
     */
    public function setPageSeoDescription($pageSeoDescription)
    {
        $this->pageSeoDescription = $pageSeoDescription;

        return $this;
    }

    /**
     * Get pageSeoDescription
     *
     * @return string
     */
    public function getPageSeoDescription()
    {
        return $this->pageSeoDescription;
    }

    /**
     * Set pageSeoKeywords
     *
     * @param string $pageSeoKeywords
     *
     * @return AdvPagesLanguages
     */
    public function setPageSeoKeywords($pageSeoKeywords)
    {
        $this->pageSeoKeywords = $pageSeoKeywords;

        return $this;
    }

    /**
     * Get pageSeoKeywords
     *
     * @return string
     */
    public function getPageSeoKeywords()
    {
        return $this->pageSeoKeywords;
    }

    /**
     * Set pageDescription
     *
     * @param string $pageDescription
     *
     * @return AdvPagesLanguages
     */
    public function setPageDescription($pageDescription)
    {
        $this->pageDescription = $pageDescription;

        return $this;
    }

    /**
     * Get pageDescription
     *
     * @return string
     */
    public function getPageDescription()
    {
        return $this->pageDescription;
    }

    /**
     * Set pageRecipiantEmails
     *
     * @param string $pageRecipiantEmails
     *
     * @return AdvPagesLanguages
     */
    public function setPageRecipiantEmails($pageRecipiantEmails)
    {
        $this->pageRecipiantEmails = $pageRecipiantEmails;

        return $this;
    }

    /**
     * Get pageRecipiantEmails
     *
     * @return string
     */
    public function getPageRecipiantEmails()
    {
        return $this->pageRecipiantEmails;
    }

    /**
     * Set modified
     *
     * @param string $modified
     *
     * @return AdvPagesLanguages
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
