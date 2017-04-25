<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalaryType
 *
 * @ORM\Table(name="advj_job_salary_type")
 * @ORM\Entity
 */
class SalaryType
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
     * @ORM\Column(name="job_salary_type_name", type="string", length=100, nullable=true)
     */
    private $jobSalaryTypeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_salary_type_user_modified", type="bigint", nullable=true)
     */
    private $jobSalaryTypeUserModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="job_salary_type_date_modified", type="datetime", nullable=true)
     */
    private $jobSalaryTypeDateModified = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="job_salary_type_position", type="bigint", nullable=true)
     */
    private $jobSalaryTypePosition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_salary_type_active", type="boolean", nullable=true)
     */
    private $jobSalaryTypeActive = '1';

    /**
     * Set jobSalaryTypeName
     *
     * @param string $jobSalaryTypeName
     *
     * @return SalaryType
     */
    public function setSalaryTypeName($jobSalaryTypeName)
    {
        $this->jobSalaryTypeName = $jobSalaryTypeName;

        return $this;
    }

    /**
     * Get jobSalaryTypeName
     *
     * @return string
     */
    public function getSalaryTypeName()
    {
        return $this->jobSalaryTypeName;
    }

    /**
     * Set jobSalaryTypeUserModified
     *
     * @param integer $jobSalaryTypeUserModified
     *
     * @return SalaryType
     */
    public function setSalaryTypeUserModified($jobSalaryTypeUserModified)
    {
        $this->jobSalaryTypeUserModified = $jobSalaryTypeUserModified;

        return $this;
    }

    /**
     * Get jobSalaryTypeUserModified
     *
     * @return integer
     */
    public function getSalaryTypeUserModified()
    {
        return $this->jobSalaryTypeUserModified;
    }

    /**
     * Set jobSalaryTypeDateModified
     *
     * @param \DateTime $jobSalaryTypeDateModified
     *
     * @return SalaryType
     */
    public function setSalaryTypeDateModified($jobSalaryTypeDateModified)
    {
        $this->jobSalaryTypeDateModified = $jobSalaryTypeDateModified;

        return $this;
    }

    /**
     * Get jobSalaryTypeDateModified
     *
     * @return \DateTime
     */
    public function getSalaryTypeDateModified()
    {
        return $this->jobSalaryTypeDateModified;
    }

    /**
     * Set jobSalaryTypePosition
     *
     * @param integer $jobSalaryTypePosition
     *
     * @return SalaryType
     */
    public function setSalaryTypePosition($jobSalaryTypePosition)
    {
        $this->jobSalaryTypePosition = $jobSalaryTypePosition;

        return $this;
    }

    /**
     * Get jobSalaryTypePosition
     *
     * @return integer
     */
    public function getSalaryTypePosition()
    {
        return $this->jobSalaryTypePosition;
    }

    /**
     * Set jobSalaryTypeActive
     *
     * @param boolean $jobSalaryTypeActive
     *
     * @return SalaryType
     */
    public function setSalaryTypeActive($jobSalaryTypeActive)
    {
        $this->jobSalaryTypeActive = $jobSalaryTypeActive;

        return $this;
    }

    /**
     * Get jobSalaryTypeActive
     *
     * @return boolean
     */
    public function getSalaryTypeActive()
    {
        return $this->jobSalaryTypeActive;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getSalaryTypeId()
    {
        return $this->id;
    }
}
