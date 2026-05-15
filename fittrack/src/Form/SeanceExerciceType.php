<?php

namespace App\Form;

use App\Entity\Exercice;
use App\Entity\SeanceExercice;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceExerciceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('exercice', EntityType::class, [
                'class' => Exercice::class,
                'choice_label' => 'nom',
                'label' => 'Exercice',
                'attr' => ['class' => 'form-select']
            ])
            ->add('series', IntegerType::class, [
                'label' => 'Séries',
                'attr' => ['class' => 'form-control', 'min' => 1]
            ])
            ->add('repetitions', IntegerType::class, [
                'label' => 'Répétitions',
                'attr' => ['class' => 'form-control', 'min' => 1]
            ])
            ->add('poids', NumberType::class, [
                'label' => 'Poids (kg)',
                'required' => false,
                'attr' => ['class' => 'form-control', 'step' => '0.5']
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'Notes',
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 2]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SeanceExercice::class,
        ]);
    }
}
