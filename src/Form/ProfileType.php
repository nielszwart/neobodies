<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city_of_birth', TextType::class, [
                'label' => 'Birthplace',
                'label_attr' => ['class' => 'question'],
                'required' => false
            ])
            ->add('birth_time', TextType::class, [
                'label' => 'Birthtime',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('weight', IntegerType::class, [
                'label' => 'Weight (in kg)',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('height', IntegerType::class, [
                'label' => 'Height (in cm)',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Gender',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I am a male' => 'I am a male',
                    'I am a female' => 'I am a female',
                    'I am a female and I birthed a child' => 'I am a female and I birthed a child',
                ]
            ])
            ->add('gender_open', TextareaType::class, [
                'label' => 'How many children and how old are they?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('feeling', ChoiceType::class, [
                'label' => 'How do you feel now, this week',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I feel okay' => 'I feel okay',
                    'I feel fit but too heavy' => 'I feel fit but too heavy',
                    'I feel fit and in shape' => 'I feel fit and in shape',
                    'I feel weak and too heavy' => 'I feel weak and too heavy',
                    'I feel weak but not too heavy' => 'I feel weak but not too heavy',
                ]
            ])
            ->add('last_sport', ChoiceType::class, [
                'label' => 'When was the last time you exercised?',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'This week' => 'This week',
                    'This month' => 'This month',
                    'Months ago' => 'Months ago',
                ]
            ])
            ->add('limits', ChoiceType::class, [
                'label' => 'Limits',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I have no physical limits' => 'I have no physical limits',
                    'I have physical limits' => 'I have physical limits',
                ]
            ])
            ->add('limits_open', TextareaType::class, [
                'label' => 'What are your physical limits?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('complaints', ChoiceType::class, [
                'label' => 'Complaints',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I have no physical complaints' => 'I have no physical complaints',
                    'I have physical complaints' => 'I have physical complaints',
                ]
            ])
            ->add('complaints_open', TextareaType::class, [
                'label' => 'What are your physical complaints?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('fysio', ChoiceType::class, [
                'label' => 'Physiotherapy',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I am currently being treated by a physiotherapist' => 'I am currently being treated by a physiotherapist',
                    'I am not being treated by a physiotherapist' => 'I am not being treated by a physiotherapist',
                ]
            ])
            ->add('fysio_open', TextareaType::class, [
                'label' => 'What treatment are you undergoing currently?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('psychic_limits', ChoiceType::class, [
                'label' => 'Psychic',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I have no mental/psychic limits' => 'I have no mental/psychic limits',
                    'I have mental/psychic limits' => 'I have mental/psychic limits',
                ]
            ])
            ->add('psychic_limits_open', TextareaType::class, [
                'label' => 'What are your physical/mental limits?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('psychotherapy', ChoiceType::class, [
                'label' => 'Psychotherapy',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I am currently being treated by a psychotherapist' => 'I am currently being treated by a psychotherapist',
                    'I am not being treated by a psychotherapist' => 'I am not being treated by a psychotherapist',
                ]
            ])
            ->add('psychotherapy_open', TextareaType::class, [
                'label' => 'What treatment are you undergoing currently?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('eating', ChoiceType::class, [
                'label' => 'Eating',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I do not have an eating disorder' => 'I do not have an eating disorder',
                    'I have an eating disorder' => 'I have an eating disorder',
                ]
            ])
            ->add('eating_open', TextareaType::class, [
                'label' => 'What eating disorder do you have?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('operations', ChoiceType::class, [
                'label' => 'Operations',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I did not have an operation in the last 5 years' => 'I did not have an operation in the last 5 years',
                    'I had an operation in the last 5 years' => 'I had an operation in the last 5 years',
                ]
            ])
            ->add('operations_open', TextareaType::class, [
                'label' => 'What operations did you have?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('medication', ChoiceType::class, [
                'label' => 'Medications',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I do not use medications' => 'I do not use medications',
                    'I use medications' => 'I use medications',
                ]
            ])
            ->add('medication_open', TextareaType::class, [
                'label' => 'What medications do you use?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('sleep_well', CheckboxType::class, [
                'label' => 'I sleep well',
                'required' => false,
            ])
            ->add('not_falling_asleep', CheckboxType::class, [
                'label' => 'I have difficulty falling asleep',
                'required' => false,
            ])
            ->add('awake_often', CheckboxType::class, [
                'label' => 'I wake up (often) at night',
                'required' => false,
            ])
            ->add('hard_to_awaken', CheckboxType::class, [
                'label' => 'I have difficulty waking up',
                'required' => false,
            ])
            ->add('easy_to_relax', CheckboxType::class, [
                'label' => 'I find it easy to relax',
                'required' => false,
            ])
            ->add('single', CheckboxType::class, [
                'label' => 'Single',
                'required' => false,
            ])
            ->add('living_together', CheckboxType::class, [
                'label' => 'Living together',
                'required' => false,
            ])
            ->add('married', CheckboxType::class, [
                'label' => 'Married',
                'required' => false,
            ])
            ->add('children', CheckboxType::class, [
                'label' => 'Children',
                'required' => false,
            ])
            ->add('nine_till_five', CheckboxType::class, [
                'label' => 'I work from 9 till 5',
                'required' => false,
            ])
            ->add('responsibilities', CheckboxType::class, [
                'label' => 'I have a lot of responsibilities at work',
                'required' => false,
            ])
            ->add('shift_work', CheckboxType::class, [
                'label' => 'I work in shifts',
                'required' => false,
            ])
            ->add('shift_work_nights', CheckboxType::class, [
                'label' => 'I work in shifts with night shifts',
                'required' => false,
            ])
            ->add('freelancer', CheckboxType::class, [
                'label' => 'I am a freelancer',
                'required' => false,
            ])
            ->add('three_breaks', CheckboxType::class, [
                'label' => 'I have 3 breaks during my work',
                'required' => false,
            ])
            ->add('jobless', CheckboxType::class, [
                'label' => 'I am jobless',
                'required' => false,
            ])
            ->add('temporary_jobless', CheckboxType::class, [
                'label' => 'I am temporarily jobless',
                'required' => false,
            ])
            ->add('stress_family', CheckboxType::class, [
                'label' => 'I get stress from my family life',
                'required' => false,
            ])
            ->add('stress_work', CheckboxType::class, [
                'label' => 'I get stress from work',
                'required' => false,
            ])
            ->add('daily_traffic_jam', CheckboxType::class, [
                'label' => 'I am in a traffic jam daily',
                'required' => false,
            ])
            ->add('want_change_life', CheckboxType::class, [
                'label' => 'I want to change my life',
                'required' => false,
            ])
            ->add('walking', CheckboxType::class, [
                'label' => 'I walk regularly',
                'required' => false,
            ])
            ->add('no_full_agenda', CheckboxType::class, [
                'label' => 'I do not have a full agenda',
                'required' => false,
            ])
            ->add('yoga', CheckboxType::class, [
                'label' => 'I regularly do yoga',
                'required' => false,
            ])
            ->add('meditate', CheckboxType::class, [
                'label' => 'I regularly meditate',
                'required' => false,
            ])
            ->add('hobbies', ChoiceType::class, [
                'label' => 'FREE-time',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I have hobbies' => 'I have hobbies',
                    'I do not have hobbies' => 'I do not have hobbies',
                ]
            ])
            ->add('hobbies_open', TextareaType::class, [
                'label' => 'What hobbies do you have?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('no_supplements', CheckboxType::class, [
                'label' => 'I do not take supplements',
                'required' => false,
            ])
            ->add('multivitamins', CheckboxType::class, [
                'label' => 'I take multivitamins',
                'required' => false,
            ])
            ->add('protein_shakes', CheckboxType::class, [
                'label' => 'I drink protein shakes',
                'required' => false,
            ])
            ->add('omega_3', CheckboxType::class, [
                'label' => 'I take omega 3',
                'required' => false,
            ])
            ->add('other_supplements', CheckboxType::class, [
                'label' => 'I take other supplements',
                'required' => false,
            ])
            ->add('other_supplements_open', TextareaType::class, [
                'label' => 'What supplements do you take?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('no_bread', CheckboxType::class, [
                'label' => 'I do not eat bread',
                'required' => false,
            ])
            ->add('some_bread', CheckboxType::class, [
                'label' => 'I eat bread sometimes',
                'required' => false,
            ])
            ->add('daily_bread', CheckboxType::class, [
                'label' => 'I eat bread daily',
                'required' => false,
            ])
            ->add('some_fat_fish', CheckboxType::class, [
                'label' => 'I eat fat fish sometimes',
                'required' => false,
            ])
            ->add('often_fat_fish', CheckboxType::class, [
                'label' => 'I eat fat fish often',
                'required' => false,
            ])
            ->add('no_fat_fish', CheckboxType::class, [
                'label' => 'I do not eat fat fish',
                'required' => false,
            ])
            ->add('only_other_fish', CheckboxType::class, [
                'label' => 'I only eat other fish',
                'required' => false,
            ])
            ->add('seaweed', CheckboxType::class, [
                'label' => 'I eat seaweed',
                'required' => false,
            ])
            ->add('eat_out_often', CheckboxType::class, [
                'label' => 'I eat out often',
                'required' => false,
            ])
            ->add('vegetarian', CheckboxType::class, [
                'label' => 'I am a vegetarian',
                'required' => false,
            ])
            ->add('allergies', ChoiceType::class, [
                'label' => 'Allergies',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I have no food allergies' => 'I have no food allergies',
                    'I have food allergies' => 'I have food allergies',
                ]
            ])
            ->add('allergies_open', TextareaType::class, [
                'label' => 'What food allergies do you have?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('intolerance', ChoiceType::class, [
                'label' => 'Intolerance',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I have no food intolerance' => 'I have no food intolerance',
                    'I have food intolerance' => 'I have food intolerance',
                ]
            ])
            ->add('intolerance_open', TextareaType::class, [
                'label' => 'What food intolerance do you have?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('bloated', CheckboxType::class, [
                'label' => 'I feel bloated',
                'required' => false,
            ])
            ->add('full', CheckboxType::class, [
                'label' => 'I often feel full after eating',
                'required' => false,
            ])
            ->add('farting', CheckboxType::class, [
                'label' => 'I suffer from flatulence',
                'required' => false,
            ])
            ->add('burping', CheckboxType::class, [
                'label' => 'I have to burp often',
                'required' => false,
            ])
            ->add('stomach_acid', CheckboxType::class, [
                'label' => 'I suffer from stomach acid',
                'required' => false,
            ])
            ->add('digestion_open', TextareaType::class, [
                'label' => 'At which moment of the day do you suffer from which symptoms?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('swollen_belly', CheckboxType::class, [
                'label' => 'I sometimes have a swollen belly',
                'required' => false,
            ])
            ->add('obstipation', CheckboxType::class, [
                'label' => 'I sometimes have obstipation',
                'required' => false,
            ])
            ->add('diarrea', CheckboxType::class, [
                'label' => 'I sometimes have diarrea',
                'required' => false,
            ])
            ->add('sported_often', CheckboxType::class, [
                'label' => 'I have exercised a lot in my life',
                'required' => false,
            ])
            ->add('group_lessons', CheckboxType::class, [
                'label' => 'I have experience with group lessons',
                'required' => false,
            ])
            ->add('strength_training', CheckboxType::class, [
                'label' => 'I have experience with strength training',
                'required' => false,
            ])
            ->add('cardio_training', CheckboxType::class, [
                'label' => 'I have experience with cardio training',
                'required' => false,
            ])
            ->add('sports_open', TextareaType::class, [
                'label' => 'I am currently practising the following sports',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
            ->add('diet', ChoiceType::class, [
                'label' => 'Diet',
                'label_attr' => ['class' => 'question'],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'I am not on a diet' => 'I am not on a diet',
                    'I was recently on a diet' => 'I was recently following a diet',
                    'I am currently on a diet' => 'I am currently on a diet',
                ]
            ])
            ->add('diet_open', TextareaType::class, [
                'label' => 'What diet are you on and for how long have you been following it?',
                'label_attr' => ['class' => 'question'],
                'required' => false,
            ])
        ;
    }
}
