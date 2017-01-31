<?php

namespace ModuleGenerator\Domain\Entity;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class EntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'className',
                ClassNameType::class,
                [
                    'name_label' => 'Entity name (i.e.: User)',
                ]
            )->add(
                'tableName',
                TextType::class,
                [
                    'label' => 'Table name',
                    'constraints' => [
                        new Regex(
                            [
                                'pattern' => '/^[\p{L}_][\p{L}\p{N}@$#_]{0,127}$/',
                                'message' => 'Invalid database table name',
                            ]
                        ),
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['form-interactor']);

        $resolver->setDefault('data_class', EntityDataTransferObject::class);
    }
}
