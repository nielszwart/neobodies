<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Title'])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => ['class' => 'ckeditor'],
            ])
            ->add('price', NumberType::class, ['label' => 'Price', 'scale' => 2])
            ->add('image', FileType::class, ['label' => 'Image', 'required' => false, 'multiple' => false])
            ->add('ebook', FileType::class, ['label' => 'E-book', 'required' => false, 'multiple' => false])
            ->add('has_genblueprint', CheckboxType::class, [
                'label' => 'Has GenBluePrint',
                'required' => false,
            ])
            ->add('is_clothing', CheckboxType::class, [
                'label' => 'Clothing',
                'required' => false,
            ])
            ->add('deleted', CheckboxType::class, [
                'label' => 'Deleted',
                'required' => false,
            ])
        ;
    }
}
