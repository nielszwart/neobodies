<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class VitamineTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1', ChoiceType::class, [
                'label' => 'Are you a vegetarian, vegan or do you skip eating animal related food?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question2', ChoiceType::class, [
                'label' => 'Do you experience extreme fatigue or concentration and memory problems?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question3', ChoiceType::class, [
                'label' => 'Do you have gut problems?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question4', ChoiceType::class, [
                'label' => 'Do you sometimes experience a painful tong or mouth ulcers?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question5', ChoiceType::class, [
                'label' => 'Do you ever experience tingling of the hands or feet?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question6', ChoiceType::class, [
                'label' => 'Do you ever feel down or depressed?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question7', ChoiceType::class, [
                'label' => 'Do you have difficulties falling a sleep or often wake up during the night?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question8', ChoiceType::class, [
                'label' => 'Do you ever feel dizziness or do you have anaemia or tinnitus?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question9', ChoiceType::class, [
                'label' => 'Do you have stomach complaints or did you have stomach surgery?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question10', ChoiceType::class, [
                'label' => 'Do you experience stress or/and are you over 55 years old',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question11', ChoiceType::class, [
                'label' => 'Do you take medicines for heartburn?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Ja' => 'Ja',
                    'Nee' => 'Nee',
                ]
            ])
            ->add('name', TextType::class, [
                'label' => 'Name',
                'label_attr' => ['class' => 'question'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => ['class' => 'question'],
            ])
            ->add('agree', CheckboxType::class, ['label' => 'I have read and agree to the terms and conditions, disclaimer and AVR', 'required' => true])
        ;
    }
}
