<?php

namespace App\Form;

use App\Entity\PatientSuivi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraint;


class RatioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('id_user_id', HiddenType::class)
            ->add('glycemie', NumberType::class, array('label' => "  "))
            ->add('glucide', NumberType::class, array('label' => "  "))
            ->add('Calcul', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PatientSuivi::class,
        ]);
    }
}
