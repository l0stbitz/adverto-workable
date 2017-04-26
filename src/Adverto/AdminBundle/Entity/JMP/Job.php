<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * Job
 *
 * @ORM\Table(name="advj_jobs")
 * @ORM\Entity
 */
class Job {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="business_unit_id", type="bigint", nullable=false)
     */
    private $businessUnitId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="BusinessUnit")
     * @ORM\JoinColumn(name="business_unit_id", referencedColumnName="id")
     */
    private $businessUnit;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false)
     */
    private $userId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="\Adverto\AdminBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="req_id", type="string", length=100, nullable=true)
     */
    private $reqId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="title_seo", type="string", length=150, nullable=true)
     */
    private $titleSeo;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="bigint", nullable=true)
     */
    private $locationId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="bigint", nullable=false)
     */
    private $categoryId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_type_id", type="bigint", nullable=true)
     */
    private $jobTypeId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="JobType")
     * @ORM\JoinColumn(name="job_type_id", referencedColumnName="id")
     */
    private $jobType;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_status_id", type="bigint", nullable=true)
     */
    private $jobStatusId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="JobStatus")
     * @ORM\JoinColumn(name="job_status_id", referencedColumnName="id")
     */
    private $jobStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="years_of_experience_id", type="bigint", nullable=true)
     */
    private $yearsOfExperienceId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="YearsOfExperience")
     * @ORM\JoinColumn(name="years_of_experience_id", referencedColumnName="id")
     */
    private $yearsOfExperience;

    /**
     * @var integer
     *
     * @ORM\Column(name="career_level_id", type="bigint", nullable=true)
     */
    private $careerLevelId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="CareerLevel")
     * @ORM\JoinColumn(name="career_level_id", referencedColumnName="id")
     */
    private $careerLevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="education_level_id", type="bigint", nullable=true)
     */
    private $educationLevelId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="EducationLevel")
     * @ORM\JoinColumn(name="education_level_id", referencedColumnName="id")
     */
    private $educationLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="salary_from", type="string", length=50, nullable=true)
     */
    private $salaryFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="salary_to", type="string", length=50, nullable=true)
     */
    private $salaryTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="salary_type_id", type="bigint", nullable=true)
     */
    private $salaryTypeId;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="SalaryType")
     * @ORM\JoinColumn(name="salary_type_id", referencedColumnName="id")
     */
    private $salaryType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="apply_emails", type="text", length=65535, nullable=false)
     */
    private $applyEmails;

    /**
     * @var integer
     *
     * @ORM\Column(name="apply_start", type="bigint", nullable=true)
     */
    private $applyStart = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="apply_finish", type="bigint", nullable=true)
     */
    private $applyFinish = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="bigint", nullable=true)
     */
    private $views = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_posted", type="integer", nullable=false)
     */
    private $datePosted = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="start_date", type="integer", nullable=true)
     */
    private $startDate = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="end_date", type="integer", nullable=true)
     */
    private $endDate = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = true;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=20, nullable=false)
     */
    private $ipAddress;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="CareerArea")
     * @ORM\JoinTable(name="advj_jobs_career_area_ass",
     *      joinColumns={@ORM\JoinColumn(name="job_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="careerarea_id", referencedColumnName="id")}
     *      )
     */
    private $careerAreas;

    public function __construct() {
        $this->careerAreas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set businessUnitId
     *
     * @param integer $businessUnitId
     *
     * @return Job
     */
    public function setBusinessUnitId($businessUnitId) {
        $this->businessUnitId = $businessUnitId;

        return $this;
    }

    /**
     * Get businessUnitId
     *
     * @return integer
     */
    public function getBusinessUnitId() {
        return $this->businessUnitId;
    }

    /**
     * Set businessUnit
     *
     * @param integer $businessUnit
     *
     * @return Job
     */
    public function setBusinessUnit($businessUnit) {
        $this->businessUnit = $businessUnit;

        return $this;
    }

    /**
     * Get businessUnit
     *
     * @return integer
     */
    public function getBusinessUnit() {
        return $this->businessUnit;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Job
     */
    public function setUserId($userId) {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Job
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set reqId
     *
     * @param string $reqId
     *
     * @return Job
     */
    public function setReqId($reqId) {
        $this->reqId = $reqId;

        return $this;
    }

    /**
     * Get reqId
     *
     * @return string
     */
    public function getReqId() {
        return $this->reqId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Job
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set titleSeo
     *
     * @param string $titleSeo
     *
     * @return Job
     */
    public function setTitleSeo($titleSeo) {
        $this->titleSeo = $titleSeo;

        return $this;
    }

    /**
     * Get titleSeo
     *
     * @return string
     */
    public function getTitleSeo() {
        return $this->titleSeo;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     *
     * @return Job
     */
    public function setLocationId($locationId) {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return integer
     */
    public function getLocationId() {
        return $this->locationId;
    }

    /**
     * Set location
     *
     * @param integer $location
     *
     * @return Job
     */
    public function setLocation($location) {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return integer
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Set category
     *
     * @param integer $categoryId
     *
     * @return Job
     */
    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId() {
        return $this->categoryId;
    }

    /**
     * Set category
     *
     * @param integer $category
     *
     * @return Job
     */
    public function setCategory($category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set jobTypeId
     *
     * @param integer $jobTypeId
     *
     * @return Job
     */
    public function setJobTypeId($jobTypeId) {
        $this->jobTypeId = $jobTypeId;

        return $this;
    }

    /**
     * Get jobTypeId
     *
     * @return integer
     */
    public function getJobTypeId() {
        return $this->jobTypeId;
    }

    /**
     * Set jobType
     *
     * @param integer $jobType
     *
     * @return Job
     */
    public function setJobType($jobType) {
        $this->jobType = $jobType;

        return $this;
    }

    /**
     * Get jobType
     *
     * @return integer
     */
    public function getJobType() {
        return $this->jobType;
    }

    /**
     * Set jobStatusId
     *
     * @param integer $jobStatusId
     *
     * @return Job
     */
    public function setJobStatusId($jobStatusId) {
        $this->jobStatusId = $jobStatusId;

        return $this;
    }

    /**
     * Get jobStatusId
     *
     * @return integer
     */
    public function getJobStatusId() {
        return $this->jobStatusId;
    }

    /**
     * Set jobStatus
     *
     * @param integer $jobStatus
     *
     * @return Job
     */
    public function setJobStatus($jobStatus) {
        $this->jobStatus = $jobStatus;

        return $this;
    }

    /**
     * Get jobStatus
     *
     * @return integer
     */
    public function getJobStatus() {
        return $this->jobStatus;
    }

    /**
     * Set yearsOfExperienceId
     *
     * @param integer $yearsOfExperienceId
     *
     * @return Job
     */
    public function setYearsOfExperienceId($yearsOfExperienceId) {
        $this->yearsOfExperienceId = $yearsOfExperienceId;

        return $this;
    }

    /**
     * Get yearsOfExperienceId
     *
     * @return integer
     */
    public function getYearsOfExperienceId() {
        return $this->yearsOfExperienceId;
    }

    /**
     * Set yearsOfExperience
     *
     * @param integer $yearsOfExperience
     *
     * @return Job
     */
    public function setYearsOfExperience($yearsOfExperience) {
        $this->yearsOfExperience = $yearsOfExperience;

        return $this;
    }

    /**
     * Get yearsOfExperience
     *
     * @return integer
     */
    public function getYearsOfExperience() {
        return $this->yearsOfExperience;
    }

    /**
     * Set careerLevelId
     *
     * @param integer $careerLevelId
     *
     * @return Job
     */
    public function setCareerLevelId($careerLevelId) {
        $this->careerLevelId = $careerLevelId;

        return $this;
    }

    /**
     * Get careerLevelId
     *
     * @return integer
     */
    public function getCareerLevelId() {
        return $this->careerLevelId;
    }

    public function __call($name, $arguments) {
        ;
    }

    /**
     * Set careerLevel
     *
     * @param integer $careerLevel
     *
     * @return Job
     */
    public function setCareerLevel($careerLevel) {
        $this->careerLevel = $careerLevel;

        return $this;
    }

    /**
     * Get careerLevel
     *
     * @return integer
     */
    public function getCareerLevel() {
        return $this->careerLevel;
    }

    /**
     * Set educationLevelId
     *
     * @param integer $educationLevelId
     *
     * @return Job
     */
    public function setEducationLevelId($educationLevelId) {
        $this->educationLevelId = $educationLevelId;

        return $this;
    }

    /**
     * Get educationLevelId
     *
     * @return integer
     */
    public function getEducationLevelId() {
        return $this->educationLevelId;
    }

    /**
     * Set educationLevel
     *
     * @param integer $educationLevel
     *
     * @return Job
     */
    public function setEducationLevel($educationLevel) {
        $this->educationLevel = $educationLevel;

        return $this;
    }

    /**
     * Get educationLevel
     *
     * @return integer
     */
    public function getEducationLevel() {
        return $this->educationLevel;
    }

    /**
     * Set salaryFrom
     *
     * @param string $salaryFrom
     *
     * @return Job
     */
    public function setSalaryFrom($salaryFrom) {
        $this->salaryFrom = $salaryFrom;

        return $this;
    }

    /**
     * Get salaryFrom
     *
     * @return string
     */
    public function getSalaryFrom() {
        return $this->salaryFrom;
    }

    /**
     * Set salaryTo
     *
     * @param string $salaryTo
     *
     * @return Job
     */
    public function setSalaryTo($salaryTo) {
        $this->salaryTo = $salaryTo;

        return $this;
    }

    /**
     * Get salaryTo
     *
     * @return string
     */
    public function getSalaryTo() {
        return $this->salaryTo;
    }

    /**
     * Set salaryTypeId
     *
     * @param integer $salaryTypeId
     *
     * @return Job
     */
    public function setSalaryTypeId($salaryTypeId) {
        $this->salaryTypeId = $salaryTypeId;

        return $this;
    }

    /**
     * Get salaryTypeId
     *
     * @return integer
     */
    public function getSalaryTypeId() {
        return $this->salaryTypeId;
    }

    /**
     * Set salaryType
     *
     * @param integer $salaryType
     *
     * @return Job
     */
    public function setSalaryType($salaryType) {
        $this->salaryType = $salaryType;

        return $this;
    }

    /**
     * Get salaryType
     *
     * @return integer
     */
    public function getSalaryType() {
        return $this->salaryType;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Job
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set applyEmails
     *
     * @param string $applyEmails
     *
     * @return Job
     */
    public function setApplyEmails($applyEmails) {
        $this->applyEmails = $applyEmails;

        return $this;
    }

    /**
     * Get applyEmails
     *
     * @return string
     */
    public function getApplyEmails() {
        return $this->applyEmails;
    }

    /**
     * Set applyStart
     *
     * @param integer $applyStart
     *
     * @return Job
     */
    public function setApplyStart($applyStart) {
        $this->applyStart = $applyStart;

        return $this;
    }

    /**
     * Get applyStart
     *
     * @return integer
     */
    public function getApplyStart() {
        return $this->applyStart;
    }

    /**
     * Set applyFinish
     *
     * @param integer $applyFinish
     *
     * @return Job
     */
    public function setApplyFinish($applyFinish) {
        $this->applyFinish = $applyFinish;

        return $this;
    }

    /**
     * Get applyFinish
     *
     * @return integer
     */
    public function getApplyFinish() {
        return $this->applyFinish;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Job
     */
    public function setViews($views) {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews() {
        return $this->views;
    }

    /**
     * Set datePosted
     *
     * @param integer $datePosted
     *
     * @return Job
     */
    public function setDatePosted($datePosted) {
        $this->datePosted = $datePosted;

        return $this;
    }

    /**
     * Get datePosted
     *
     * @return integer
     */
    public function getDatePosted() {
        return $this->datePosted;
    }

    /**
     * Set startDate
     *
     * @param integer $startDate
     *
     * @return Job
     */
    public function setStartDate($startDate) {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return integer
     */
    public function getStartDate() {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param intger $endDate
     *
     * @return Job
     */
    public function setEndDate($endDate) {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return integer
     */
    public function getEndDate() {
        return $this->endDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Job
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return Job
     */
    public function setIpAddress($ipAddress) {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress() {
        return $this->ipAddress;
    }

    /**
     * Set careerArea
     *
     * @param integer $careerAreas
     *
     * @return Job
     */
    public function setCareerAreas($careerAreas) {
        $this->careerAreas = $careerAreas;

        return $this;
    }

    /**
     * Get careerAreas
     *
     * @return integer
     */
    public function getCareerAreas() {
        return $this->careerAreas;
    }

}
