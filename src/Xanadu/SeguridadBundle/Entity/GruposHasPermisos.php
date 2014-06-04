<?php

namespace Xanadu\SeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GruposHasPermisos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GruposHasPermisos
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
     * @ORM\Column(name="grupo", type="integer")
     */
    private $grupo;

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
     * Set grupo
     *
     * @param integer $grupo
     * @return GruposHasPermisos
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

    /**
     * Set permiso
     *
     * @param integer $permiso
     * @return GruposHasPermisos
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
