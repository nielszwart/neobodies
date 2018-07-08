<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Your name'])
            ->add('email', EmailType::class, ['label' => 'E-mail'])
            ->add('phone', TextType::class, ['label' => 'Phone number', 'required' => false])
            ->add('message', TextareaType::class, ['label' => 'Message'])
        ;
    }
}