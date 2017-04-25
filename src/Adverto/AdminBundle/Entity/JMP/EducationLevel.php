<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * EducationLevel
 *
 * @ORM\Table(name="advj_job_education_level")
 * @ORM\Entity
 */
class EducationLevel
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
     * @ORM\Column(name="job_education_level_name", type="string", length=100, nullable=true)
     */
    private $jobEducationLevelName;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_education_level_user_modified", type="bigint", nullable=true)
     */
    private $jobEducationLevelUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_education_level_date_modified", type="datetime", nullable=true)
     */
    private $jobEducationLevelDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_education_level_position", type="bigint", nullable=true)
     */
    private $jobEducationLevelPosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_education_level_active", type="boolean", nullable=true)
     */
    private $jobEducationLevelActive = '1';

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set jobEducationLevelName
     *
     * @param string $jobEducationLevelName
     *
     * @return EducationLevel
     */
    public function setEducationLevelName($jobEducationLevelName)
    {
        $this->jobEducationLevelName = $jobEducationLevelName;

        return $this;
    }

    /**
     * Get jobEducationLevelName
     *
     * @return string
     */
    public function getEducationLevelName()
    {
        return $this->jobEducationLevelName;
    }

    /**
     * Set jobEducationLevelUserModified
     *
     * @param integer $jobEducationLevelUserModified
     *
     * @return EducationLevel
     */
    public function setEducationLevelUserModified($jobEducationLevelUserModified)
    {
        $this->jobEducationLevelUserModified = $jobEducationLevelUserModified;

        return $this;
    }

    /**
     * Get jobEducationLevelUserModified
     *
     * @return integer
     */
    public function getEducationLevelUserModified()
    {
        return $this->jobEducationLevelUserModified;
    }

    /**
     * Set jobEducationLevelDateModified
     *
     * @param \DateTime $jobEducationLevelDateModified
     *
     * @return EducationLevel
     */
    public function setEducationLevelDateModified($jobEducationLevelDateModified)
    {
        $this->jobEducationLevelDateModified = $jobEducationLevelDateModified;

        return $this;
    }

    /**
     * Get jobEducationLevelDateModified
     *
     * @return \DateTime
     */
    public function getEducationLevelDateModified()
    {
        return $this->jobEducationLevelDateModified;
    }

    /**
     * Set jobEducationLevelPosition
     *
     * @param integer $jobEducationLevelPosition
     *
     * @return EducationLevel
     */
    public function setEducationLevelPosition($jobEducationLevelPosition)
    {
        $this->jobEducationLevelPosition = $jobEducationLevelPosition;

        return $this;
    }

    /**
     * Get jobEducationLevelPosition
     *
     * @return integer
     */
    public function getEducationLevelPosition()
    {
        return $this->jobEducationLevelPosition;
    }

    /**
     * Set jobEducationLevelActive
     *
     * @param boolean $jobEducationLevelActive
     *
     * @return EducationLevel
     */
    public function setEducationLevelActive($jobEducationLevelActive)
    {
        $this->jobEducationLevelActive = $jobEducationLevelActive;

        return $this;
    }

    /**
     * Get jobEducationLevelActive
     *
     * @return boolean
     */
    public function getEducationLevelActive()
    {
        return $this->jobEducationLevelActive;
    }
}
