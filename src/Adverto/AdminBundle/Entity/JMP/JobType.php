<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobType
 *
 * @ORM\Table(name="advj_job_types")
 * @ORM\Entity
 */
class JobType
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="job_type_name", type="string", length=100, nullable=true)
     */
    private $jobTypeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_type_user_modified", type="bigint", nullable=true)
     */
    private $jobTypeUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_type_date_modified", type="datetime", nullable=true)
     */
    private $jobTypeDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_type_position", type="bigint", nullable=true)
     */
    private $jobTypePosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_type_active", type="boolean", nullable=true)
     */
    private $jobTypeActive = '1';

    /**
     * Set jobTypeName
     *
     * @param string $jobTypeName
     *
     * @return JobType
     */
    public function setJobTypeName($jobTypeName)
    {
        $this->jobTypeName = $jobTypeName;

        return $this;
    }

    /**
     * Get jobTypeName
     *
     * @return string
     */
    public function getJobTypeName()
    {
        return $this->jobTypeName;
    }

    /**
     * Set jobTypeUserModified
     *
     * @param integer $jobTypeUserModified
     *
     * @return JobType
     */
    public function setJobTypeUserModified($jobTypeUserModified)
    {
        $this->jobTypeUserModified = $jobTypeUserModified;

        return $this;
    }

    /**
     * Get jobTypeUserModified
     *
     * @return integer
     */
    public function getJobTypeUserModified()
    {
        return $this->jobTypeUserModified;
    }

    /**
     * Set jobTypeDateModified
     *
     * @param \DateTime $jobTypeDateModified
     *
     * @return JobType
     */
    public function setJobTypeDateModified($jobTypeDateModified)
    {
        $this->jobTypeDateModified = $jobTypeDateModified;

        return $this;
    }

    /**
     * Get jobTypeDateModified
     *
     * @return \DateTime
     */
    public function getJobTypeDateModified()
    {
        return $this->jobTypeDateModified;
    }

    /**
     * Set jobTypePosition
     *
     * @param integer $jobTypePosition
     *
     * @return JobType
     */
    public function setJobTypePosition($jobTypePosition)
    {
        $this->jobTypePosition = $jobTypePosition;

        return $this;
    }

    /**
     * Get jobTypePosition
     *
     * @return integer
     */
    public function getJobTypePosition()
    {
        return $this->jobTypePosition;
    }

    /**
     * Set jobTypeActive
     *
     * @param boolean $jobTypeActive
     *
     * @return JobType
     */
    public function setJobTypeActive($jobTypeActive)
    {
        $this->jobTypeActive = $jobTypeActive;

        return $this;
    }

    /**
     * Get jobTypeActive
     *
     * @return boolean
     */
    public function getJobTypeActive()
    {
        return $this->jobTypeActive;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getJobTypeId()
    {
        return $this->id;
    }
}
