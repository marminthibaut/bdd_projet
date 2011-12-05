<?php

namespace ProjetBDD\Thesaurus\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TermeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('id')
        ;
    }

    public function getName()
    {
        return 'projetbdd_thesaurus_bundle_termetype';
    }
}
