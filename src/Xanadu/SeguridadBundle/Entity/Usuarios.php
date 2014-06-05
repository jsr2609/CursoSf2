<?php

namespace Xanadu\SeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Usuarios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuarios implements AdvancedUserInterface, \Serializable
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
    
    /**
     *
     * @ORM\Column(name="Salt", type="string", length=255)
     */
    private $salt;
    
    /**
     *
     * @ORM\Column(name="Activo", type="boolean", length=255)
     */
    private $activo = true;
    
   

    //Inicio de funciones para seguridad
    
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->nombreUsuario,
            $this->password,
        ));
    }

    public function unserialize($serialized) {
        list (
            $this->id,
            $this->nombreUsuario,
            $this->password,
        ) = unserialize($serialized);
    }   

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getUsername() {
        
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->activo;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    
    //Fin de funciones para seguridad
    
    
    
    //Inicio de funciones automáticas
    
    
    

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grupos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->salt = md5(uniqid(null, true));
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
     * Set salt
     *
     * @param string $salt
     * @return Usuarios
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Usuarios
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
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
