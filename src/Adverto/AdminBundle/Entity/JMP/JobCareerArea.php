<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobCareerArea
 *
 * @ORM\Table(name="advj_jobs_career_area_ass")
 * @ORM\Entity
 */
class JobCareerArea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="job_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $jobId;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_career_area_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $jobCareerAreaId;



    /**
     * Set jobId
     *
     * @param integer $jobId
     *
     * @return JobCareerArea
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;

        return $this;
    }

    /**
     * Get jobId
     *
     * @return integer
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * Set jobCareerAreaId
     *
     * @param integer $jobCareerAreaId
     *
     * @return JobCareerArea
     */
    public function setJobCareerAreaId($jobCareerAreaId)
    {
        $this->jobCareerAreaId = $jobCareerAreaId;

        return $this;
    }

    /**
     * Get jobCareerAreaId
     *
     * @return integer
     */
    public function getJobCareerAreaId()
    {
        return $this->jobCareerAreaId;
    }
}
