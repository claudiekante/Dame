<?php

namespace App\Form;

use App\Entity\Leg;
use App\Entity\Stop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('legName', TextType::class, [
                'label' => 'Nom *'
            ])
            ->add('startStop', EntityType::class, [
                'label' => 'Départ *',
                'class'=>Stop::class,
                'choice_label'=>'stopName',
                'placeholder'=>'choisir une étape *',
//               'mapped' => false
            ])
            ->add('endStop', EntityType::class, [
                'label' => 'Arrivée *',
                'class'=>Stop::class,
                'choice_label'=>'stopName',
                'placeholder'=>'choisir une étape *',
//               'mapped' => false
            ])
            ->add('legDescription', TextareaType::class, [
                'label' => 'Description du trajet *'
            ])
            ->add('legKilometers', NumberType::class, [
                'label' => 'Kilométrage *',
                'help'=>'ex 999.99'
            ] )
            ->add('legAccessible', ChoiceType::class, [
                'label' => 'La route est accessible ? *',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ]
            ])



//            ->add('dateCreatedLeg')
//            ->add('dateModifiedLeg')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Leg::class,
        ]);
    }
}
