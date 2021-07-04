<?php

namespace App\Form;

use App\Entity\Chasse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('heureEntrainement')
            ->add('pokemon_capture_id')
            ->add('dresseur_id')
            ->add('lieu_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chasse::class,
        ]);
    }
}
