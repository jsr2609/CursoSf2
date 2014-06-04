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
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Grupos", inversedBy="permisos")
     * @ORM\JoinColumn(name="GrupoId", referencedColumnName="Id", unique=false,
     *   nullable=false, onDelete="RESTRICT"
     * )
     */
    private $grupo;

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
     * Set grupo
     *
     * @param \Xanadu\SeguridadBundle\Entity\Grupos $grupo
     * @return GruposHasPermisos
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

    /**
     * Set permiso
     *
     * @param \Xanadu\SeguridadBundle\Entity\Permisos $permiso
     * @return GruposHasPermisos
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
