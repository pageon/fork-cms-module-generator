<?php

namespace ModuleGenerator\PhpGenerator\Form;

use ModuleGenerator\PhpGenerator\DataTransferObject\MemberDataTransferObject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

abstract class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Name',
                    'required' => true,
                    'constraints' => [
                        new NotNull(),
                    ],
                ]
            )
            ->add(
                'Visibility',
                VisibilityType::class,
                ['data' => $options['default_visibility']]
            );
        if ($options['ask_comment']) {
            $builder->add(
                'comment',
                TextareaType::class,
                [
                    'label' => 'Comment',
                    'required' => true,
                    'constraints' => [
                        new NotNull(),
                    ],
                ]
            );
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'ask_comment' => false,
                'default_visibility' => VisibilityType::VISIBILITY_PRIVATE,
            ]
        );
    }
}
