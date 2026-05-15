<?php

namespace App\Form;

use App\Entity\Programme;
use App\Entity\Seance;
use App\Repository\ProgrammeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'label' => 'Date et heure',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée (minutes)',
                'attr' => ['class' => 'form-control', 'min' => 1]
            ])
            ->add('statut', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'Planifiée' => 'planifiee',
                    'Complétée' => 'completee',
                    'Annulée' => 'annulee',
                ],
                'attr' => ['class' => 'form-select']
            ])
            ->add('Programme', EntityType::class, [
                'class' => Programme::class,
                'choice_label' => 'nom',
                'label' => 'Programme',
                'required' => false,
                'attr' => ['class' => 'form-select'],
                'query_builder' => function(ProgrammeRepository $repo) use ($options) {
                    return $repo->createQueryBuilder('p')
                        ->where('p.utilisateur = :user')
                        ->setParameter('user', $options['user']);
                },
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'Notes',
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
            'user' => null,
        ]);
    }
}
