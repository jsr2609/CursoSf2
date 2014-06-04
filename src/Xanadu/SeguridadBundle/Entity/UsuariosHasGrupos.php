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
     * @ORM\Column(name="grupo", type="integer")
     */
    private $grupo;


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
     * @return UsuariosHasGrupos
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
     * Set grupo
     *
     * @param integer $grupo
     * @return UsuariosHasGrupos
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return integer 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}
