<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * CareerLevel
 *
 * @ORM\Table(name="advj_job_career_level")
 * @ORM\Entity
 */
class CareerLevel
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
     * @ORM\Column(name="job_career_level_name", type="string", length=100, nullable=true)
     */
    private $jobCareerLevelName;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_career_level_user_modified", type="bigint", nullable=true)
     */
    private $jobCareerLevelUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_career_level_date_modified", type="datetime", nullable=true)
     */
    private $jobCareerLevelDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_career_level_position", type="bigint", nullable=true)
     */
    private $jobCareerLevelPosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_career_level_active", type="boolean", nullable=true)
     */
    private $jobCareerLevelActive = '1';

    /**
     * Set jobCareerLevelName
     *
     * @param string $jobCareerLevelName
     *
     * @return CareerLevel
     */
    public function setCareerLevelName($jobCareerLevelName)
    {
        $this->jobCareerLevelName = $jobCareerLevelName;

        return $this;
    }

    /**
     * Get jobCareerLevelName
     *
     * @return string
     */
    public function getCareerLevelName()
    {
        return $this->jobCareerLevelName;
    }

    /**
     * Set jobCareerLevelUserModified
     *
     * @param integer $jobCareerLevelUserModified
     *
     * @return CareerLevel
     */
    public function setCareerLevelUserModified($jobCareerLevelUserModified)
    {
        $this->jobCareerLevelUserModified = $jobCareerLevelUserModified;

        return $this;
    }

    /**
     * Get jobCareerLevelUserModified
     *
     * @return integer
     */
    public function getCareerLevelUserModified()
    {
        return $this->jobCareerLevelUserModified;
    }

    /**
     * Set jobCareerLevelDateModified
     *
     * @param \DateTime $jobCareerLevelDateModified
     *
     * @return CareerLevel
     */
    public function setCareerLevelDateModified($jobCareerLevelDateModified)
    {
        $this->jobCareerLevelDateModified = $jobCareerLevelDateModified;

        return $this;
    }

    /**
     * Get jobCareerLevelDateModified
     *
     * @return \DateTime
     */
    public function getCareerLevelDateModified()
    {
        return $this->jobCareerLevelDateModified;
    }

    /**
     * Set jobCareerLevelPosition
     *
     * @param integer $jobCareerLevelPosition
     *
     * @return CareerLevel
     */
    public function setCareerLevelPosition($jobCareerLevelPosition)
    {
        $this->jobCareerLevelPosition = $jobCareerLevelPosition;

        return $this;
    }

    /**
     * Get jobCareerLevelPosition
     *
     * @return integer
     */
    public function getCareerLevelPosition()
    {
        return $this->jobCareerLevelPosition;
    }

    /**
     * Set jobCareerLevelActive
     *
     * @param boolean $jobCareerLevelActive
     *
     * @return CareerLevel
     */
    public function setCareerLevelActive($jobCareerLevelActive)
    {
        $this->jobCareerLevelActive = $jobCareerLevelActive;

        return $this;
    }

    /**
     * Get jobCareerLevelActive
     *
     * @return boolean
     */
    public function getCareerLevelActive()
    {
        return $this->jobCareerLevelActive;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getCareerLevelId()
    {
        return $this->id;
    }
}
