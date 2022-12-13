<?php

namespace App\Form;

use App\Entity\Journey;
use App\Entity\Leg;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JourneyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('journeyName', TextType::class, [
                'label'=>'Le nom du voyage *'
            ])
            ->add('journeyDescription', TextareaType::class, [
                'label' => 'Description du voyage *'
            ])
            ->add('journeyDateStart', DateType::class, [
                'label'=>'Date du départ ',
                'html5'=> true,
                'widget'=> 'single_text',
                'required' => false,
            ])
            ->add('journeyFirstLeg', EntityType::class, [
                'label' => 'Premier parcours *',
                'class'=>Leg::class,
                'choice_label'=>'legName',
                'placeholder'=>'choisir un parcours',
            ])
            ->add('journeySecondLeg', EntityType::class, [
                'label' => 'Deuxième parcours',
                'class'=>Leg::class,
                'choice_label'=>'legName',
                'placeholder'=>'choisir un parcours',
                'required' => false,
            ])
            ->add('journeyThirdLeg', EntityType::class, [
                'label' => 'Troisième parcours',
                'class'=>Leg::class,
                'choice_label'=>'legName',
                'placeholder'=>'choisir un parcours',
                'required' => false,
            ])
            ->add('journeyFourthLeg', EntityType::class, [
                'label' => 'Quatrième parcours',
                'class'=>Leg::class,
                'choice_label'=>'legName',
                'placeholder'=>'choisir un parcours',
                'required' => false,
            ])
            ->add('journeyFifthLeg', EntityType::class, [
                'label' => 'Cinquième parcours',
                'class'=>Leg::class,
                'choice_label'=>'legName',
                'placeholder'=>'choisir un parcours',
                'required' => false,
            ])
            ->add('journeySixthLeg', EntityType::class, [
                'label' => 'Sixième parcours',
                'class'=>Leg::class,
                'choice_label'=>'legName',
                'placeholder'=>'choisir un parcours',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Journey::class,
        ]);
    }
}
