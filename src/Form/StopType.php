<?php

namespace App\Form;

use App\Entity\Stop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('stopName', TextType::class, [
                'label' => 'Nom *'
            ])
            ->add('stopLatitude', NumberType::class, [
                'label' => 'Latitude ',
                'help'=>'ex -111.111111'
            ])
            ->add('stopLongitude', NumberType::class, [
                'label' => 'Longitude ',
                'help'=>'ex -111.111111'
            ])
            ->add('stopPluscode', TextType::class, [
                'label' => 'PlusCode ',
                'help'=>'ex 8FQ4QXFQ+33'
            ]);


//            ->add('dateCreatedStop')
//            ->add('dateModifiedStop')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stop::class,
        ]);
    }
}
