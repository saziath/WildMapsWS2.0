<?php

namespace App\Form;

use App\Entity\Itineraire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItineraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pays')
            ->add('ville')
            ->add('billetDAvion')
            ->add('hotel')
            ->add('activite')
            ->add('description')
            ->add('commentaire')
            ->add('prix')
            ->add('note')
            ->add('nom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Itineraire::class,
        ]);
    }
}
