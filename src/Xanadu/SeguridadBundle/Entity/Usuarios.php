<?php

namespace Xanadu\SeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuarios
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
     * @var string
     *
     * @ORM\Column(name="NombreUsuario", type="string", length=30)
     */
    private $nombreUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=60)
     */
    private $email;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Perfiles", mappedBy="usuario", cascade={"all"})
     */
    private $perfil;
    
    /**
     * @ORM\ManyToMany(targetEntity="Grupos") 
     * @ORM\JoinTable(name="UsuariosHasGrupos",
     *     joinColumns={@ORM\JoinColumn(name="UsuarioId", referencedColumnName="Id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="GrupoId", referencedColumnName="Id")}
     * )
     */
    private $grupos;
    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="Permisos") 
     * @ORM\JoinTable(name="UsuariosHasPermisos",
     *     joinColumns={@ORM\JoinColumn(name="UsuarioId", referencedColumnName="Id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="PermisoId", referencedColumnName="Id")}
     * )
     */          
    private $permisos;
    
   

    //Inicio de funciones para seguridad
    
    
    //Fin de funciones para seguridad
    
    
    
    //Inicio de funciones automáticas
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grupos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     * @return Usuarios
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string 
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuarios
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set perfil
     *
     * @param \Xanadu\SeguridadBundle\Entity\Perfiles $perfil
     * @return Usuarios
     */
    public function setPerfil(\Xanadu\SeguridadBundle\Entity\Perfiles $perfil = null)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get perfil
     *
     * @return \Xanadu\SeguridadBundle\Entity\Perfiles 
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Add grupos
     *
     * @param \Xanadu\SeguridadBundle\Entity\Grupos $grupos
     * @return Usuarios
     */
    public function addGrupo(\Xanadu\SeguridadBundle\Entity\Grupos $grupos)
    {
        $this->grupos[] = $grupos;

        return $this;
    }

    /**
     * Remove grupos
     *
     * @param \Xanadu\SeguridadBundle\Entity\Grupos $grupos
     */
    public function removeGrupo(\Xanadu\SeguridadBundle\Entity\Grupos $grupos)
    {
        $this->grupos->removeElement($grupos);
    }

    /**
     * Get grupos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * Add permisos
     *
     * @param \Xanadu\SeguridadBundle\Entity\Permisos $permisos
     * @return Usuarios
     */
    public function addPermiso(\Xanadu\SeguridadBundle\Entity\Permisos $permisos)
    {
        $this->permisos[] = $permisos;

        return $this;
    }

    /**
     * Remove permisos
     *
     * @param \Xanadu\SeguridadBundle\Entity\Permisos $permisos
     */
    public function removePermiso(\Xanadu\SeguridadBundle\Entity\Permisos $permisos)
    {
        $this->permisos->removeElement($permisos);
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermisos()
    {
        return $this->permisos;
    }
}
