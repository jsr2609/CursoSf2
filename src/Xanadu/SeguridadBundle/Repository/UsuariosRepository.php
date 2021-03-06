<?php

namespace Xanadu\SeguridadBundle\Repository;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\EntityRepository;

/**
 * UsuariosHasPermisosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuariosRepository extends EntityRepository implements UserProviderInterface
{
    //Inicio de funciones que se implementan de la Interfaz
    
    public function loadUserByUsername($username)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->select('u', 'g', 'p', 'p1', 'p2')
            ->where('u.nombreUsuario = :valor OR u.email = :valor or u.id = :valor')
            ->setParameter('valor', $username)
            ->leftJoin('u.grupos', 'g')
            ->leftJoin('g.permisos', 'p')
            ->leftJoin('u.perfil', 'p1')
            ->leftJoin('u.permisos', 'p2')             
            ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active admin AcmeUserBundle:User object identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }

        return $this->loadUserByUsername($user->getId());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() === $class
            || is_subclass_of($class, $this->getEntityName());
    }
    
    //Fin de funciones que se implementan de la Interfaz
    
    public function recuperarPassword($usuario)
    {
        $dql = "SELECT u.password FROM XanaduSeguridadBundle:Usuarios u WHERE u.id = :usuario";
        $consulta = $this->getEntityManager()->createQuery($dql)
                ->setParameter("usuario", $usuario);
        
        return $consulta->getSingleScalarResult();
    }

    
}
