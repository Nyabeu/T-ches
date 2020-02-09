<?php

namespace App\Form;

use App\Entity\TaskFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TaskFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ascDate',  CheckboxType::class, [
                    'label'    => 'Date',
                    'required' => false,
                    'value'=> true, ])
            ->add('status', ChoiceType::class, [
                    'required' => false,
                    'choices' => [
                    "A faire" => "A faire",
                    "En cours" => "En cours",
                    "Terminée" => "Terminée",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TaskFilter::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }
     public function getBlockPrefix(){
        return '';
     }
}
