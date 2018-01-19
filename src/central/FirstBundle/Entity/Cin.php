<?php

namespace central\FirstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cin
 *
 * @ORM\Table(name="cin")
 * @ORM\Entity(repositoryClass="central\FirstBundle\Repository\CinRepository")
 */
class Cin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", unique= true, nullable=false )
     */
    private $numero;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Cin
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }
}
