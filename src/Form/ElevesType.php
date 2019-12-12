<?php

namespace App\Form;

use App\Entity\Eleves;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\EtablissementOrigine;
use App\Entity\Classe;
use App\Entity\EnseignementComp;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class ElevesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, ['attr' =>['class' => 'form-control'],])
            ->add('prenom', TextType::class, ['attr' =>['class' => 'form-control'],])
            ->add('sexe', ChoiceType::class, [
                'attr' =>['class' => 'form-control'],
                'choices'  => [
                    'H' => 'H',
                    'F' => 'F',
                ],
            ])
            ->add('date_naissance', BirthdayType::class, [
                'years' => range(1980,2050),
                'attr' =>['class' => 'form-control']
            ])
            ->add('statut', ChoiceType::class, [
                'attr' =>['class' => 'form-control'],
                'choices'  => [
                    'Demi-Pensionnaire' => 'Demi-Pensionnaire',
                    'Externe' => 'Externe',
                    'Interne' => 'Interne',
                ],
            ])
            ->add('lv2', ChoiceType::class, [
                'attr' =>['class' => 'form-control'],
                'choices'  => [
                    'Aucun' => 'Aucun',
                    'Espagnol' => 'Espagnol',
                    'Allemand' => 'Allemand',
                    'Allemand Bilangue' => 'Allemand Bilangue',
                ],
            ])
            ->add('remarque', TextareaType::class, ['attr' =>['class' => 'form-control'],])
            ->add('amenagement_pedagogique', ChoiceType::class, [
                'attr' =>['class' => 'form-control'],
                'choices'  => [
                    'Aucun' => 'Aucun',
                    '1/3 temps' => '1/3 temps',
                    '1/4 temps' => '1/4 temps',
                ],
            ])
            ->add('etablissement_origine', EntityType::class, [
                'attr' =>['class' => 'form-control'],
                'class' => EtablissementOrigine::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u');
                },
                'choice_label' => 'nom_etablissement_origine',
            ])
            ->add('classe', EntityType::class, [
                'attr' =>['class' => 'form-control'],
                'class' => Classe::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u');
                },
                'choice_label' => 'nom_classe',
            ])
            ->add('enseignement_comp', EntityType::class, [
                'attr' =>['class' => 'form-control'],
                'class' => EnseignementComp::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u');
                },
                'choice_label' => 'nom_enseignement_comp',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleves::class,
        ]);
    }
}
