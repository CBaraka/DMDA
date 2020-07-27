<?php

namespace App\Form;

use App\Entity\AdhesionParticuliers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AdhesionParticuliersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Situation', ChoiceType::class, [
            'choices' => [
            'Particulier' => 'Particulier',
            'Organisme' => 'Organisme',
            ],
            'required' => 'true',
            ])
            ->add('Nom', TextType::class, ['required' => 'true',])
            ->add('Prenom', TextType::class, ['required' => 'true',])
            ->add('Adresse', TextType::class, ['required' => 'true',])
            ->add('Code_postale', TextType::class, ['required' => 'true',])
            ->add('Ville', TextType::class, ['required' => 'true',])
            ->add('Pays', CountryType::class, ['required' => 'true',])
            ->add('Date_de_naissance', DateType::class, [
            'widget' => 'single_text',
            // this is actually the default format for single_text
            'format' => 'yyyy-MM-dd', 'required' => 'true',
            ])
            ->add('Email', EmailType::class, ['required' => 'true',])
            ->add('Montant', MoneyType::class)
            ->add('Valider', SubmitType::class, ['label' => 'Valider'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AdhesionParticuliers::class,
        ]);
    }
}
