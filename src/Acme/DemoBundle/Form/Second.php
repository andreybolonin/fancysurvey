<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Second extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ice_cream', 'text', array(
            'label'         => 'WHATS YOUR FAVORITE ICE CREAM?',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('car', 'text', array(
            'label'         => 'WHATS YOUR FAVORITE ICE CAR?',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('book', 'text', array(
            'label'         => 'WHATS YOUR FAVORITE BOOK?',
            'required'      => true,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('date', 'date', array(
            'label'         => 'WHATS YOUR FAVORITE DATE?',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        $builder->add('country', 'text', array(
            'label'         => 'WHATS YOUR FAVORITE COUNTRY?',
            'required'      => false,
            'attr'  => array(
                'placeholder'   => '',
            ),
        ));

        return $builder;
    }

    public function getName()
    {
        return 'second';
    }

}