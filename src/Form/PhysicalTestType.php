<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class PhysicalTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bicep_curl_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Bicep Curl.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('bicep_curl_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('tricep_extension_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Tricep Extension.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('tricep_extension_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('leg_extension_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Leg Extension or Leg Press.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('leg_extension_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('leg_curl_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Leg Curl.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('leg_curl_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('chest_press_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Chest machine or Chest press.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('chest_press_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('lat_pulley_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Lat Pulley.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('lat_pulley_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('shoulder_press_max', IntegerType::class, [
                'label' => 'Maximum power (1 repetition) Shoulder Press or Front Raises.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('shoulder_press_80', IntegerType::class, [
                'label' => 'Amount of repetitions with 80% of your maximum power.',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('waist', IntegerType::class, [
                'label' => 'Waist size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('belly', IntegerType::class, [
                'label' => 'Belly size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('hip', IntegerType::class, [
                'label' => 'Hip size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('upper_arm', IntegerType::class, [
                'label' => 'Upper arm size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('chest', IntegerType::class, [
                'label' => 'Chest size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('neck', IntegerType::class, [
                'label' => 'Neck size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('upper_leg', IntegerType::class, [
                'label' => 'Upper leg size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('lower_leg', IntegerType::class, [
                'label' => 'Lower leg size',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('chin', IntegerType::class, [
                'label' => 'Chin',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('cheek', IntegerType::class, [
                'label' => 'Cheek',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('armpit_chest', IntegerType::class, [
                'label' => 'Armpit/Chest',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('tricep', IntegerType::class, [
                'label' => 'Tricep',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('bicep', IntegerType::class, [
                'label' => 'Bicep',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('back_shoulderblade', IntegerType::class, [
                'label' => 'Back/shoulder blade',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('lower_back', IntegerType::class, [
                'label' => 'Lower back',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('torso_upper_right', IntegerType::class, [
                'label' => 'Right upper side of torso',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('waist_right', IntegerType::class, [
                'label' => 'Right side of waist',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('waist_front_right', IntegerType::class, [
                'label' => 'Right front side of your waist',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('belly_button', IntegerType::class, [
                'label' => 'Front of your belly/belly button',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('knee', IntegerType::class, [
                'label' => 'Knee',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('calf', IntegerType::class, [
                'label' => 'Calf',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('upper_leg_front', IntegerType::class, [
                'label' => 'Front of upper leg',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,                
            ])
            ->add('upper_leg_back', IntegerType::class, [
                'label' => 'Back of upper leg',
                'label_attr' => ['class' => 'question'],
                'required' => false,
                'empty_data' => null,
            ])
        ;
    }
}
