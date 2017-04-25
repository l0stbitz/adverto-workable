<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobTemplate
 *
 * @ORM\Table(name="advj_job_templates")
 * @ORM\Entity
 */
class JobTemplate
{
    /**
     * @var string
     *
     * @ORM\Column(name="job_template_name", type="string", length=100, nullable=false)
     */
    private $jobTemplateName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="job_template_info", type="text", nullable=false)
     */
    private $jobTemplateInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_template_user_modified", type="bigint", nullable=true)
     */
    private $jobTemplateUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_template_date_modified", type="datetime", nullable=false)
     */
    private $jobTemplateDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_template_position", type="bigint", nullable=true)
     */
    private $jobTemplatePosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_template_active", type="boolean", nullable=true)
     */
    private $jobTemplateActive = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_template_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $jobTemplateId;



    /**
     * Set jobTemplateName
     *
     * @param string $jobTemplateName
     *
     * @return JobTemplate
     */
    public function setJobTemplateName($jobTemplateName)
    {
        $this->jobTemplateName = $jobTemplateName;

        return $this;
    }

    /**
     * Get jobTemplateName
     *
     * @return string
     */
    public function getJobTemplateName()
    {
        return $this->jobTemplateName;
    }

    /**
     * Set jobTemplateInfo
     *
     * @param string $jobTemplateInfo
     *
     * @return JobTemplate
     */
    public function setJobTemplateInfo($jobTemplateInfo)
    {
        $this->jobTemplateInfo = $jobTemplateInfo;

        return $this;
    }

    /**
     * Get jobTemplateInfo
     *
     * @return string
     */
    public function getJobTemplateInfo()
    {
        return $this->jobTemplateInfo;
    }

    /**
     * Set jobTemplateUserModified
     *
     * @param integer $jobTemplateUserModified
     *
     * @return JobTemplate
     */
    public function setJobTemplateUserModified($jobTemplateUserModified)
    {
        $this->jobTemplateUserModified = $jobTemplateUserModified;

        return $this;
    }

    /**
     * Get jobTemplateUserModified
     *
     * @return integer
     */
    public function getJobTemplateUserModified()
    {
        return $this->jobTemplateUserModified;
    }

    /**
     * Set jobTemplateDateModified
     *
     * @param \DateTime $jobTemplateDateModified
     *
     * @return JobTemplate
     */
    public function setJobTemplateDateModified($jobTemplateDateModified)
    {
        $this->jobTemplateDateModified = $jobTemplateDateModified;

        return $this;
    }

    /**
     * Get jobTemplateDateModified
     *
     * @return \DateTime
     */
    public function getJobTemplateDateModified()
    {
        return $this->jobTemplateDateModified;
    }

    /**
     * Set jobTemplatePosition
     *
     * @param integer $jobTemplatePosition
     *
     * @return JobTemplate
     */
    public function setJobTemplatePosition($jobTemplatePosition)
    {
        $this->jobTemplatePosition = $jobTemplatePosition;

        return $this;
    }

    /**
     * Get jobTemplatePosition
     *
     * @return integer
     */
    public function getJobTemplatePosition()
    {
        return $this->jobTemplatePosition;
    }

    /**
     * Set jobTemplateActive
     *
     * @param boolean $jobTemplateActive
     *
     * @return JobTemplate
     */
    public function setJobTemplateActive($jobTemplateActive)
    {
        $this->jobTemplateActive = $jobTemplateActive;

        return $this;
    }

    /**
     * Get jobTemplateActive
     *
     * @return boolean
     */
    public function getJobTemplateActive()
    {
        return $this->jobTemplateActive;
    }

    /**
     * Get jobTemplateId
     *
     * @return integer
     */
    public function getJobTemplateId()
    {
        return $this->jobTemplateId;
    }
}
