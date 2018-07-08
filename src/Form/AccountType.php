<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, ['label' => 'First name'])
            ->add('last_name', TextType::class, ['label' => 'Last name'])
            ->add('address', TextType::class, ['label' => 'Address', 'required' => false])
            ->add('postcode', TextType::class, ['label' => 'Postcode', 'required' => false])
            ->add('city', TextType::class, ['label' => 'City', 'required' => false])
            ->add('phone_number', TextType::class, ['label' => 'Phone number', 'required' => false])
            ->add('date_of_birth', DateType::class, ['widget' => 'single_text', 'label' => 'Date of birth', 'required' => false])
            ->add('agree', CheckboxType::class, ['label' => 'I have read and agree to the terms and conditions, disclaimer and AVR', 'required' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
