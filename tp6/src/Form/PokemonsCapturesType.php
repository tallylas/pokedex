<?php

namespace App\Form;

use App\Entity\PokemonsCaptures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonsCapturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sexe')
            ->add('niveau')
            ->add('xp')
            ->add('dresseur_id')
            ->add('pokemon_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PokemonsCaptures::class,
        ]);
    }
}
