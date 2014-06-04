<?php

namespace Xanadu\SeguridadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Xanadu\SeguridadBundle\Form\PerfilesType;

class UsuariosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las contraseñas no son iguales.',
                
                'required' => true,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Confirma Password'),
                'required' => false
            ))
            ->add('email')
            ->add('perfil', new PerfilesType())
            ->add('grupos')
            ->add('permisos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xanadu\SeguridadBundle\Entity\Usuarios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xanadu_seguridadbundle_usuarios';
    }
}
