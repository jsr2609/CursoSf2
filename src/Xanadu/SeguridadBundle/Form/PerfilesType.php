<?php

namespace Xanadu\SeguridadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PerfilesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('telefonoParticular')
            ->add('domicilio')
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xanadu\SeguridadBundle\Entity\Perfiles'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xanadu_seguridadbundle_perfiles';
    }
}
