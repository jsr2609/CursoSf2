<?php

namespace Xanadu\SeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfiles
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Perfiles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer")
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="TelefonoParticular", type="string", length=30)
     */
    private $telefonoParticular;

    /**
     * @var string
     *
     * @ORM\Column(name="Domicilio", type="string", length=150)
     */
    private $domicilio;


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
     * Set usuario
     *
     * @param integer $usuario
     * @return Perfiles
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set telefonoParticular
     *
     * @param string $telefonoParticular
     * @return Perfiles
     */
    public function setTelefonoParticular($telefonoParticular)
    {
        $this->telefonoParticular = $telefonoParticular;

        return $this;
    }

    /**
     * Get telefonoParticular
     *
     * @return string 
     */
    public function getTelefonoParticular()
    {
        return $this->telefonoParticular;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Perfiles
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }
}
