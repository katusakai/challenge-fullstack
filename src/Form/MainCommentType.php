<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MainCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('userId', NumberType::class, [
                'attr' => ['hidden' => ''],
                'label' => false
            ])
            ->add('text', TextareaType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Add a comment']
            ])
            ->add('createdAt', DateTimeType::class, [
                'data' => new \DateTime(),
                'attr' => ['hidden' => ''],
                'widget' => 'single_text',
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
