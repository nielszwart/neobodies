<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class MagnesiumTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1', ChoiceType::class, [
                'label' => 'Do you drink sparkling beverages?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes, I drink them daily' => 'Ja, ik drink bijna dagelijks koolzuurhoudende dranken',
                    'Yes, I drink them but not more than 5 glasses a week.' => 'Ja, ik drink niet meer dan 5 glazen koolzuurhoudende drank per week',
                    'No, I don’t drink sparkling beverages' => 'Nee, ik drink geen koolzuurhoudende dranken',
                ]
            ])
            ->add('question2', ChoiceType::class, [
                'label' => 'Do you consume sugar-containing foods?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes I do, I can’t resist them' => 'Ja, ik kan niet van zoetigheid afblijven',
                    'Yes I do, but I try to minimize it' => 'Ik probeer minder suiker in te nemen',
                    'No' => 'Nee',
                ]
            ])
            ->add('question3', ChoiceType::class, [
                'label' => 'Do you drink coffee, tea or other caffeine containing drinks?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes, more than three cups a day.' => 'Ja, wel meer dan 3 kopjes per dag',
                    'Yes, but not more than 1 or 2 cups a day' => 'Ja, maar het blijft meestal bij 1 a 2 kopjes per dag',
                    'No' => 'Nee',
                ]
            ])
            ->add('question4', ChoiceType::class, [
                'label' => 'Do you experience a lot of stress in your life?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes i have several stress moments a day' => 'Ja, dagelijks heb ik wel een stress momenten',
                    'Yes I have stress but not on a daily basis.' => 'Soms, maar niet dagelijks',
                    'No' => 'Nee, ik heb geen stress',
                ]
            ])
            ->add('question5', ChoiceType::class, [
                'label' => 'When you go to bed to sleep...',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'You struggle to fall a sleep' => 'heb je moeite met inslapen',
                    'You wake up several times a night' => 'word je steeds wakker',
                    'You fall a sleep easily' => 'val je snel in slaap',
                    'You suffer from muscle cramps often' => 'heb ik wel eens last van verkrampte spieren tijdens mijn slaap',
                ]
            ])
            ->add('question6', ChoiceType::class, [
                'label' => 'Do you use medicines for blood pressure, heart or lung disease?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes I do' => 'Ja, ik gebruik dit soort medicijnen',
                    'No, but I do have compatible physical complains' => 'Nee, maar ik heb wel lichamelijke klachten in die richting',
                    'No' => 'Nee ik gebruik geen medicijnen',
                ]
            ])
            ->add('question7', ChoiceType::class, [
                'label' => 'Do you drink more than 7 glasses of alcohol containing drinks a week?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question8', ChoiceType::class, [
                'label' => 'Are you experiencing a tremor of your eyelid or other muscle tremors?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                ]
            ])
            ->add('question9', ChoiceType::class, [
                'label' => 'Do you have diabetes type 1 or 2?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Yes' => 'Ja',
                    'No' => 'Nee',
                    'I don’t know' => 'Weet ik niet',
                ]
            ])
            ->add('question10', ChoiceType::class, [
                'label' => 'What is your age?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Younger than 40 years old' => 'Jonger dan 40',
                    '40-55' => '40-55',
                    '55+' => '55+'
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
