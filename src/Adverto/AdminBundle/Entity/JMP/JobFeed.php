<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobFeed
 *
 * @ORM\Table(name="advj_jobs_feed_ass")
 * @ORM\Entity
 */
class JobFeed
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
     * @ORM\Column(name="job_feed", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $jobFeed;



    /**
     * Set jobId
     *
     * @param integer $jobId
     *
     * @return JobFeed
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
     * Set jobFeed
     *
     * @param integer $jobFeed
     *
     * @return JobFeed
     */
    public function setJobFeed($jobFeed)
    {
        $this->jobFeed = $jobFeed;

        return $this;
    }

    /**
     * Get jobFeed
     *
     * @return integer
     */
    public function getJobFeed()
    {
        return $this->jobFeed;
    }
}
