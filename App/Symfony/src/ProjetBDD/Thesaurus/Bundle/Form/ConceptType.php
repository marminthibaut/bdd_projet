<?php

namespace ProjetBDD\Thesaurus\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ConceptType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('terme_vedette')
            ->add('concept_general', 'entity', array('class'=>'ProjetBDD\Thesaurus\Bundle\Entity\Concept', 'property'=>'terme_vedette', 'required' => false))
            ->add('synonymes', 'entity', array('class'=>'ProjetBDD\Thesaurus\Bundle\Entity\Terme', 'property'=>'libelle', 'required' => false, 'multiple' => true))
            ->add('associations', 'entity', array('class'=>'ProjetBDD\Thesaurus\Bundle\Entity\Concept', 'property'=>'terme_vedette', 'required' => false, 'multiple' => true))
        ;
    }

    public function getName()
    {
        return 'projetbdd_thesaurus_bundle_concepttype';
    }
}
