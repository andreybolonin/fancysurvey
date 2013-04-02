<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class First extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name', 'text', array(
            'label'         => 'FIRST NAME',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('last_name', 'text', array(
            'label'         => 'LAST NAME',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('email', 'text', array(
            'label'         => 'EMAIL ADDRESS',
            'required'      => true,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('birthday', 'birthday', array(
            'label'         => 'BIRTHDAY',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('shoe_size', 'text', array(
            'label'         => 'SHOE SIZE',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('ice_cream', 'hidden');
        $builder->add('car', 'hidden');
        $builder->add('book', 'hidden');
        $builder->add('date', 'date', array(
            'required'      => false,
            'attr'  => array(
                'style' => "display: none;",
                'hidden' => true
            ),
        ));
        $builder->add('country', 'hidden');

        return $builder;
    }

    public function getName()
    {
        return 'first';
    }

}