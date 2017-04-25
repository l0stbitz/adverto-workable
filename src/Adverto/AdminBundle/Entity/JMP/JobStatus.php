<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobStatus
 *
 * @ORM\Table(name="advj_job_status")
 * @ORM\Entity
 */
class JobStatus
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
     * @ORM\Column(name="job_status_name", type="string", length=100, nullable=true)
     */
    private $jobStatusName;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_status_user_modified", type="bigint", nullable=true)
     */
    private $jobStatusUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_status_date_modified", type="datetime", nullable=true)
     */
    private $jobStatusDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_status_position", type="bigint", nullable=true)
     */
    private $jobStatusPosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_status_active", type="boolean", nullable=true)
     */
    private $jobStatusActive = '1';

    /**
     * Set jobStatusName
     *
     * @param string $jobStatusName
     *
     * @return JobStatus
     */
    public function setJobStatusName($jobStatusName)
    {
        $this->jobStatusName = $jobStatusName;

        return $this;
    }

    /**
     * Get jobStatusName
     *
     * @return string
     */
    public function getJobStatusName()
    {
        return $this->jobStatusName;
    }

    /**
     * Set jobStatusUserModified
     *
     * @param integer $jobStatusUserModified
     *
     * @return JobStatus
     */
    public function setJobStatusUserModified($jobStatusUserModified)
    {
        $this->jobStatusUserModified = $jobStatusUserModified;

        return $this;
    }

    /**
     * Get jobStatusUserModified
     *
     * @return integer
     */
    public function getJobStatusUserModified()
    {
        return $this->jobStatusUserModified;
    }

    /**
     * Set jobStatusDateModified
     *
     * @param \DateTime $jobStatusDateModified
     *
     * @return JobStatus
     */
    public function setJobStatusDateModified($jobStatusDateModified)
    {
        $this->jobStatusDateModified = $jobStatusDateModified;

        return $this;
    }

    /**
     * Get jobStatusDateModified
     *
     * @return \DateTime
     */
    public function getJobStatusDateModified()
    {
        return $this->jobStatusDateModified;
    }

    /**
     * Set jobStatusPosition
     *
     * @param integer $jobStatusPosition
     *
     * @return JobStatus
     */
    public function setJobStatusPosition($jobStatusPosition)
    {
        $this->jobStatusPosition = $jobStatusPosition;

        return $this;
    }

    /**
     * Get jobStatusPosition
     *
     * @return integer
     */
    public function getJobStatusPosition()
    {
        return $this->jobStatusPosition;
    }

    /**
     * Set jobStatusActive
     *
     * @param boolean $jobStatusActive
     *
     * @return JobStatus
     */
    public function setJobStatusActive($jobStatusActive)
    {
        $this->jobStatusActive = $jobStatusActive;

        return $this;
    }

    /**
     * Get jobStatusActive
     *
     * @return boolean
     */
    public function getJobStatusActive()
    {
        return $this->jobStatusActive;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getJobStatusId()
    {
        return $this->id;
    }
}
