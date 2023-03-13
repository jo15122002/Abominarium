<?php

namespace App\Form;

use App\Entity\Abomistar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbomistarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageUrl')
            ->add('name')
            ->add('size')
            ->add('weight')
            ->add('anecdotes')
            ->add('alimentation')
            ->add('capacities')
            ->add('types')
            ->add('habitat')
            ->add('previousEvolution')
            ->add('nextEvolution')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abomistar::class,
        ]);
    }
}
