<?php

namespace App\Form;

use App\Entity\Eleves;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElevesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('date_naissance')
            ->add('statut')
            ->add('lv2')
            ->add('remarque')
            ->add('amenagement_pedagogique')
            ->add('etablissement_origine')
            ->add('classe')
            ->add('enseignement_comp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleves::class,
        ]);
    }
}
