<?php

namespace Xanadu\SeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosHasPermisos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Xanadu\SeguridadBundle\Repository\UsuariosHasPermisosRepository")
 */
class UsuariosHasPermisos
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
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="permisos")
     * @ORM\JoinColumn(name="UsuarioId", referencedColumnName="Id", unique=false,
     *   nullable=false, onDelete="RESTRICT"
     * )
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Permisos")
     * @ORM\JoinColumn(name="PermisoId", referencedColumnName="Id", unique=false,
     *   nullable=false, onDelete="RESTRICT"
     * )
     */
    private $permiso;

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
     * @return UsuariosHasPermisos
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
     * Set permiso
     *
     * @param \Xanadu\SeguridadBundle\Entity\Permisos $permiso
     * @return UsuariosHasPermisos
     */
    public function setPermiso(\Xanadu\SeguridadBundle\Entity\Permisos $permiso)
    {
        $this->permiso = $permiso;

        return $this;
    }

    /**
     * Get permiso
     *
     * @return \Xanadu\SeguridadBundle\Entity\Permisos 
     */
    public function getPermiso()
    {
        return $this->permiso;
    }
}
