<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * YearsOfExperience
 *
 * @ORM\Table(name="advj_job_years_of_experience")
 * @ORM\Entity
 */
class YearsOfExperience
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
     * @ORM\Column(name="job_years_of_experience_name", type="string", length=100, nullable=true)
     */
    private $jobYearsOfExperienceName;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_years_of_experience_user_modified", type="bigint", nullable=true)
     */
    private $jobYearsOfExperienceUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_years_of_experience_date_modified", type="datetime", nullable=true)
     */
    private $jobYearsOfExperienceDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_years_of_experience_position", type="bigint", nullable=true)
     */
    private $jobYearsOfExperiencePosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_years_of_experience_active", type="boolean", nullable=true)
     */
    private $jobYearsOfExperienceActive = '1';

    /**
     * Set jobYearsOfExperienceName
     *
     * @param string $jobYearsOfExperienceName
     *
     * @return YearsOfExperience
     */
    public function setYearsOfExperienceName($jobYearsOfExperienceName)
    {
        $this->jobYearsOfExperienceName = $jobYearsOfExperienceName;

        return $this;
    }

    /**
     * Get jobYearsOfExperienceName
     *
     * @return string
     */
    public function getYearsOfExperienceName()
    {
        return $this->jobYearsOfExperienceName;
    }

    /**
     * Set jobYearsOfExperienceUserModified
     *
     * @param integer $jobYearsOfExperienceUserModified
     *
     * @return YearsOfExperience
     */
    public function setYearsOfExperienceUserModified($jobYearsOfExperienceUserModified)
    {
        $this->jobYearsOfExperienceUserModified = $jobYearsOfExperienceUserModified;

        return $this;
    }

    /**
     * Get jobYearsOfExperienceUserModified
     *
     * @return integer
     */
    public function getYearsOfExperienceUserModified()
    {
        return $this->jobYearsOfExperienceUserModified;
    }

    /**
     * Set jobYearsOfExperienceDateModified
     *
     * @param \DateTime $jobYearsOfExperienceDateModified
     *
     * @return YearsOfExperience
     */
    public function setYearsOfExperienceDateModified($jobYearsOfExperienceDateModified)
    {
        $this->jobYearsOfExperienceDateModified = $jobYearsOfExperienceDateModified;

        return $this;
    }

    /**
     * Get jobYearsOfExperienceDateModified
     *
     * @return \DateTime
     */
    public function getYearsOfExperienceDateModified()
    {
        return $this->jobYearsOfExperienceDateModified;
    }

    /**
     * Set jobYearsOfExperiencePosition
     *
     * @param integer $jobYearsOfExperiencePosition
     *
     * @return YearsOfExperience
     */
    public function setYearsOfExperiencePosition($jobYearsOfExperiencePosition)
    {
        $this->jobYearsOfExperiencePosition = $jobYearsOfExperiencePosition;

        return $this;
    }

    /**
     * Get jobYearsOfExperiencePosition
     *
     * @return integer
     */
    public function getYearsOfExperiencePosition()
    {
        return $this->jobYearsOfExperiencePosition;
    }

    /**
     * Set jobYearsOfExperienceActive
     *
     * @param boolean $jobYearsOfExperienceActive
     *
     * @return YearsOfExperience
     */
    public function setYearsOfExperienceActive($jobYearsOfExperienceActive)
    {
        $this->jobYearsOfExperienceActive = $jobYearsOfExperienceActive;

        return $this;
    }

    /**
     * Get jobYearsOfExperienceActive
     *
     * @return boolean
     */
    public function getYearsOfExperienceActive()
    {
        return $this->jobYearsOfExperienceActive;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getYearsOfExperienceId()
    {
        return $this->id;
    }
}
