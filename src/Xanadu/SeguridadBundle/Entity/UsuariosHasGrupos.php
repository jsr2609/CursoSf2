<?php

namespace Xanadu\SeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosHasGrupos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UsuariosHasGrupos
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
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="grupos")
     * @ORM\JoinColumn(name="UsuarioId", referencedColumnName="Id", unique=false,
     *   nullable=false, onDelete="RESTRICT"
     * )
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Grupos")
     * @ORM\JoinColumn(name="GrupoId", referencedColumnName="Id", unique=false,
     *   nullable=false, onDelete="RESTRICT"
     * )
     */
    private $grupo;
    
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
     * Set usuario
     *
     * @param \Xanadu\SeguridadBundle\Entity\Usuarios $usuario
     * @return UsuariosHasGrupos
     */
    public function setUsuario(\Xanadu\SeguridadBundle\Entity\Usuarios $usuario)
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

    /**
     * Set grupo
     *
     * @param \Xanadu\SeguridadBundle\Entity\Grupos $grupo
     * @return UsuariosHasGrupos
     */
    public function setGrupo(\Xanadu\SeguridadBundle\Entity\Grupos $grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \Xanadu\SeguridadBundle\Entity\Grupos 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}
