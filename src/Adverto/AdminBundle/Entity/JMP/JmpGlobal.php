<?php

namespace Adverto\AdminBundle\Entity\JMP;

use Doctrine\ORM\Mapping as ORM;

/**
 * JmpGlobal
 *
 * @ORM\Table(name="advj_jmp_globals")
 * @ORM\Entity
 */
class JmpGlobal
{
    /**
     * @var string
     *
     * @ORM\Column(name="global_value", type="string", length=500, nullable=true)
     */
    private $globalValue;

    /**
     * @var string
     *
     * @ORM\Column(name="global_name", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $globalName;



    /**
     * Set globalValue
     *
     * @param string $globalValue
     *
     * @return JmpGlobal
     */
    public function setGlobalValue($globalValue)
    {
        $this->globalValue = $globalValue;

        return $this;
    }

    /**
     * Get globalValue
     *
     * @return string
     */
    public function getGlobalValue()
    {
        return $this->globalValue;
    }

    /**
     * Get globalName
     *
     * @return string
     */
    public function getGlobalName()
    {
        return $this->globalName;
    }
}
