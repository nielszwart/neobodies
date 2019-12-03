<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContentBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Title', 'required' => true])
            ->add('subtitle', TextType::class, ['label' => 'Subtitle', 'required' => false])
            ->add('text', TextareaType::class, [
                'label' => 'Text',
                'required' => false,
                'attr' => ['class' => 'ckeditor'],
            ])
            ->add('image', FileType::class, ['label' => 'Image', 'required' => false])
        ;
    }
}
