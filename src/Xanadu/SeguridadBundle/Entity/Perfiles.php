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
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\OneToOne(targetEntity="Usuarios", inversedBy="perfil")
     * @ORM\JoinColumn(name="UsuarioId", referencedColumnName="Id")
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

    //Inicio de funciones automáticas
    

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

    /**
     * Set usuario
     *
     * @param \Xanadu\SeguridadBundle\Entity\Usuarios $usuario
     * @return Perfiles
     */
    public function setUsuario(\Xanadu\SeguridadBundle\Entity\Usuarios $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Xanadu\SeguridadBundle\Entity\Usuarios 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
