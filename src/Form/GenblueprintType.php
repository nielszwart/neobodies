<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class GenblueprintType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1a', ChoiceType::class, [
                'label' => 'Describe yourself',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Excited' => 'green',
                    'Ready to fight' => 'blue',
                    'Social' => 'red',
                ],
                'data' => isset($options['data']['answers']['question1a']) ? $options['data']['answers']['question1a'] : [],
            ])
            ->add('question1b', ChoiceType::class, [
                'label' => 'Describe yourself',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Lively' => 'green',
                    'Incisive' => 'blue',
                    'Loving' => 'red',
                ],
                'data' => isset($options['data']['answers']['question1b']) ? $options['data']['answers']['question1b'] : [],
            ])
            ->add('question1c', ChoiceType::class, [
                'label' => 'Describe yourself',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Cheerful' => 'green',
                    'Courteous' => 'blue',
                    'Friendly' => 'red',
                ],
                'data' => isset($options['data']['answers']['question1c']) ? $options['data']['answers']['question1c'] : [],
            ])
            ->add('question1d', ChoiceType::class, [
                'label' => 'Describe yourself',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Creative' => 'green',
                    'Conscientious' => 'blue',
                    'Generous' => 'red',
                ],
                'data' => isset($options['data']['answers']['question1d']) ? $options['data']['answers']['question1d'] : [],
            ])
            ->add('question1e', ChoiceType::class, [
                'label' => 'Describe yourself',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Fast learner' => 'green',
                    'Quick-witted' => 'blue',
                    'Thoughtful' => 'red',
                ],
                'data' => isset($options['data']['answers']['question1e']) ? $options['data']['answers']['question1e'] : [],
            ])
            ->add('question1f', ChoiceType::class, [
                'label' => 'Describe yourself',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Bright' => 'green',
                    'Insightful' => 'blue',
                    'Quiet and thoughtful' => 'red',
                ],
                'data' => isset($options['data']['answers']['question1f']) ? $options['data']['answers']['question1f'] : [],
            ])
            ->add('question2', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'My mother had a slim and fit shape when she was young' => 'green',
                    'My mother was athletically built when she was young, neither fat nor skinny' => 'blue',
                    'My mother was a bit heavy and somewhat chubby when she was young' => 'red',
                ],
                'data' => isset($options['data']['answers']['question2']) ? $options['data']['answers']['question2'] : [],
            ])
            ->add('question3', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'My father had a slim and fit shape when he was young' => 'green',
                    'My father was athletically built when he was young, neither fat nor skinny' => 'blue',
                    'My father was a bit heavy and somewhat chubby when he was young' => 'red',
                ],
                'data' => isset($options['data']['answers']['question3']) ? $options['data']['answers']['question3'] : [],
            ])
            ->add('question4', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I had a slim and fit shape when I was young' => 'green',
                    'I was athletically built when I was young, neither fat nor skinny' => 'blue',
                    'I was a bit heavy and somewhat chubby when I was young' => 'red',
                ],
                'data' => isset($options['data']['answers']['question4']) ? $options['data']['answers']['question4'] : [],
            ])
            ->add('question5', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have been slim and fit all my life' => 'green',
                    'I have been athletically built all my life, neither fat nor skinny' => 'blue',
                    'In my life, I have become heavier and somewhat more chubby' => 'red',
                ],
                'data' => isset($options['data']['answers']['question5']) ? $options['data']['answers']['question5'] : [],
            ])
            ->add('question6', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'My bones are light and I have clear-cut joints' => 'green',
                    'I have a medium bone structure' => 'blue',
                    'I have a heavy bone structure' => 'red',
                ],
                'data' => isset($options['data']['answers']['question6']) ? $options['data']['answers']['question6'] : [],
            ])
            ->add('question7', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'As a child I was able to walk long distances' => 'green',
                    'As a child I was good at all sorts of sports' => 'blue',
                    'As a child I could easily run short distances' => 'red',
                ],
                'data' => isset($options['data']['answers']['question7']) ? $options['data']['answers']['question7'] : [],
            ])
            ->add('question8', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have always had a lot of energy' => 'green',
                    'I have always had varying energy levels' => 'blue',
                    'I have always had a stable energy level' => 'red',
                ],
                'data' => isset($options['data']['answers']['question8']) ? $options['data']['answers']['question8'] : [],
            ])
            ->add('question9', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I am a light sleeper' => 'green',
                    'I often sleep well' => 'blue',
                    'I am a heavy sleeper' => 'red',
                ],
                'data' => isset($options['data']['answers']['question9']) ? $options['data']['answers']['question9'] : [],
            ])
            ->add('question10', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'My mood is often changing' => 'green',
                    'I have control over my emotions and thoughts' => 'blue',
                    'I have a steady mood and balanced emotions' => 'red',
                ],
                'data' => isset($options['data']['answers']['question10']) ? $options['data']['answers']['question10'] : [],
            ])
            ->add('question11', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'When I am stressed I can get worried and anxious' => 'green',
                    'When I am stressed I tend to avoid the stressful situation' => 'blue',
                    'When I am stressed I am irritable and angry' => 'red',
                ],
                'data' => isset($options['data']['answers']['question11']) ? $options['data']['answers']['question11'] : [],
            ])
            ->add('question12', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Physical activity makes me feel more relaxed' => 'green',
                    'Physical activity makes me control my emotions' => 'blue',
                    'Physical activity decreases my weight' => 'red',
                ],
                'data' => isset($options['data']['answers']['question12']) ? $options['data']['answers']['question12'] : [],
            ])
            ->add('question13', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'It’s difficult for me to gain weight' => 'green',
                    'It’s easy for me to gain and lose weight' => 'blue',
                    'It’s easy for me to gain weight, but difficult to lose weight' => 'red',
                ],
                'data' => isset($options['data']['answers']['question13']) ? $options['data']['answers']['question13'] : [],
            ])
            ->add('question14', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have a varying appetite, my eyes are often bigger than my belly' => 'green',
                    'I have a stable appetite and will feel an urge to eat whenever I skip a meal' => 'blue',
                    'I have a stable appetite, but it’s easy for me to skip a meal' => 'red',
                ],
                'data' => isset($options['data']['answers']['question14']) ? $options['data']['answers']['question14'] : [],
            ])
            ->add('question15', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have irregular stools which sometimes results in obstipation' => 'green',
                    'I have regular stools, sometimes twice or more a day' => 'blue',
                    'I have regular stools; heavy and firm' => 'red',
                ],
                'data' => isset($options['data']['answers']['question15']) ? $options['data']['answers']['question15'] : [],
            ])
            ->add('question16', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I don’t digest optimally' => 'green',
                    'I digest constantly' => 'blue',
                    'I digest somewhat slowly' => 'red',
                ],
                'data' => isset($options['data']['answers']['question16']) ? $options['data']['answers']['question16'] : [],
            ])
            ->add('question17', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I like salty snacks and fatty foods' => 'green',
                    'I prefer protein-rich foods such as chicken, meat, eggs and beans' => 'blue',
                    'I like bread and starches' => 'red',
                ],
                'data' => isset($options['data']['answers']['question17']) ? $options['data']['answers']['question17'] : [],
            ])
            ->add('question18', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I like to remain physically active' => 'green',
                    'I enjoy physical activity in the form of a competition' => 'blue',
                    'I prefer relaxing activities' => 'red',
                ],
                'data' => isset($options['data']['answers']['question18']) ? $options['data']['answers']['question18'] : [],
            ])
            ->add('question19', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I don’t sweat often and I have cold hands and feet' => 'green',
                    'I sweat like a regular person and have normal blood circulation' => 'blue',
                    'I sweat easily and have normal blood circulation' => 'red',
                ],
                'data' => isset($options['data']['answers']['question19']) ? $options['data']['answers']['question19'] : [],
            ])
            ->add('question20', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I am often thirsty or my thirst level varies' => 'green',
                    'My thirst level is regular' => 'blue',
                    'I’m almost never thirsty' => 'red',
                ],
                'data' => isset($options['data']['answers']['question20']) ? $options['data']['answers']['question20'] : [],
            ])
            ->add('question21', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have small, active and dark eyes' => 'green',
                    'I have penetrating eyes' => 'blue',
                    'I have big eyes and big eyelids' => 'red',
                ],
                'data' => isset($options['data']['answers']['question21']) ? $options['data']['answers']['question21'] : [],
            ])
            ->add('question22', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have dry skin that easily flakes' => 'green',
                    'I have oily skin' => 'blue',
                    'I have a thick, cool and smooth skin' => 'red',
                ],
                'data' => isset($options['data']['answers']['question22']) ? $options['data']['answers']['question22'] : [],
            ])
            ->add('question23', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have a light skin and don’t easily tan' => 'green',
                    'I have a light skin and easily tan' => 'blue',
                    'I have a dark skin and easily tan' => 'red',
                ],
                'data' => isset($options['data']['answers']['question23']) ? $options['data']['answers']['question23'] : [],
            ])
            ->add('question24', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I have brittle nails' => 'green',
                    'I have flexible nails that are strong' => 'blue',
                    'I have thick nails that are strong' => 'red',
                ],
                'data' => isset($options['data']['answers']['question24']) ? $options['data']['answers']['question24'] : [],
            ])
            ->add('question25', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'My hair is dark, stiff, rough or frizzy' => 'green',
                    'My hair is light and easily becomes grey' => 'blue',
                    'My hair is thick and wavy and is brilliant in color' => 'red',
                ],
                'data' => isset($options['data']['answers']['question25']) ? $options['data']['answers']['question25'] : [],
            ])
            ->add('question26', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I prefer a warm climate with high humidity' => 'green',
                    'I prefer a cool climate' => 'blue',
                    'I have no climate preferences' => 'red',
                ],
                'data' => isset($options['data']['answers']['question26']) ? $options['data']['answers']['question26'] : [],
            ])
            ->add('question27', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'At home, I like to set the temperature at 23 degrees or higher' => 'green',
                    'At home, I like to set the temperature in between 20 and 22 degrees' => 'blue',
                    'At home, I like to set the temperature at lower than 20 degrees' => 'red',
                ],
                'data' => isset($options['data']['answers']['question27']) ? $options['data']['answers']['question27'] : [],
            ])
            ->add('question28', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Money is something that needs to be spent' => 'green',
                    'Money is necessary to live, but not very important' => 'blue',
                    'Money is something that needs to be saved' => 'red',
                ],
                'data' => isset($options['data']['answers']['question28']) ? $options['data']['answers']['question28'] : [],
            ])
            ->add('question29', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'The best time for me to exercise is in the afternoon' => 'green',
                    'The best time for me to exercise is in the morning or afternoon' => 'blue',
                    'The best time for me to exercise is in the morning' => 'red',
                ],
                'data' => isset($options['data']['answers']['question29']) ? $options['data']['answers']['question29'] : [],
            ])
            ->add('question30', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'With a weakened immune system I get tired, my reaction levels are slower and my body doesn´t function well' => 'green',
                    'With a weakened immune system, my digestion and bowel function declines' => 'blue',
                    'With a weakened immune system, I initially feel snotty' => 'red',
                ],
                'data' => isset($options['data']['answers']['question30']) ? $options['data']['answers']['question30'] : [],
            ])
            ->add('question01', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'In times of intense stress I tend to look for an escape' => 'green',
                    'In times of intense stress I tend to fight' => 'blue',
                    'In times of intense stress I wouldn’t know what I would do' => 'red',
                ],
                'data' => isset($options['data']['answers']['question01']) ? $options['data']['answers']['question01'] : [],
            ])
            ->add('question02', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'After I’ve exercised too intensely, I become nauseous' => 'green',
                    'After I’ve exercised too intensely, I feel more energized' => 'blue',
                    'When do I exercise too intensely? I never do that!' => 'red',
                ],
                'data' => isset($options['data']['answers']['question02']) ? $options['data']['answers']['question02'] : [],
            ])
            ->add('question03', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'It is easy for me to push my physical boundaries' => 'green',
                    'It is hard for me to push my physical boundaries' => 'blue',
                    'I don’t know how to push my physical boundaries' => 'red',
                ],
                'data' => isset($options['data']['answers']['question03']) ? $options['data']['answers']['question03'] : [],
            ])
            ->add('question04', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I like to ‘go hard’ when I’m exercising' => 'green',
                    'I prefer exercising with proper form over ‘going hard’' => 'blue',
                    'I see exercising as a necessary evil' => 'red',
                ],
                'data' => isset($options['data']['answers']['question04']) ? $options['data']['answers']['question04'] : [],
            ])
            ->add('question05', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I like to party and I’m always the last one to leave' => 'green',
                    'I hate parties and I hardly ever go to one' => 'blue',
                    'Depending on the mood I’m in, I’ll show up to some parties' => 'red',
                ],
                'data' => isset($options['data']['answers']['question05']) ? $options['data']['answers']['question05'] : [],
            ])
            ->add('question06', ChoiceType::class, [
                'label' => 'What applies',
                'label_attr' => ['class' => 'question'],
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'I constantly need people around me in order to feel good' => 'green',
                    'I prefer to be alone' => 'blue',
                    'Sometimes I like to have people around me and sometimes I don’t' => 'red',
                ],
                'data' => isset($options['data']['answers']['question06']) ? $options['data']['answers']['question06'] : [],
            ])

        ;
    }
}
