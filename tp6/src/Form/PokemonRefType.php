<?php

namespace App\Form;

use App\Entity\PokemonRef;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonRefType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pokemonId')
            ->add('nom')
            ->add('courbeXP')
            ->add('evolution')
            ->add('type1')
            ->add('type2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PokemonRef::class,
        ]);
    }
}
