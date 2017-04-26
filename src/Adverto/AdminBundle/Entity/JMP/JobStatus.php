<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobStatus
 *
 * @ORM\Table(name="advj_job_status")
 * @ORM\Entity
 */
class JobStatus {

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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="\Adverto\AdminBundle\Entity\User")
     * @ORM\JoinColumn(name="user_modified", referencedColumnName="id")
     */
    private $userModified;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_modified", type="integer", nullable=true)
     */
    private $dateModified = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="bigint", nullable=true)
     */
    private $position;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = 1;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return JobStatus
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set userModified
     *
     * @param integer $userModified
     *
     * @return JobStatus
     */
    public function setUserModified($userModified) {
        $this->userModified = $userModified;

        return $this;
    }

    /**
     * Get userModified
     *
     * @return integer
     */
    public function getUserModified() {
        return $this->userModified;
    }

    /**
     * Set dateModified
     *
     * @param integer $dateModified
     *
     * @return JobStatus
     */
    public function setDateModified($dateModified) {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return integer
     */
    public function getDateModified() {
        return $this->dateModified;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return JobStatus
     */
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return JobStatus
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

    public function __toString() {
        return $this->getName();
    }

}
