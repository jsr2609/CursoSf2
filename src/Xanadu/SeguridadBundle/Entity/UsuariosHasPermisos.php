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
     * @var integer
     *
     * @ORM\Column(name="permiso", type="integer")
     */
    private $permiso;


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
     * @return UsuariosHasPermisos
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
     * Set permiso
     *
     * @param integer $permiso
     * @return UsuariosHasPermisos
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;

        return $this;
    }

    /**
     * Get permiso
     *
     * @return integer 
     */
    public function getPermiso()
    {
        return $this->permiso;
    }
}
