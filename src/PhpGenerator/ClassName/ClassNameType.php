<?php

namespace ModuleGenerator\PhpGenerator\Common;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespaceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

final class ClassNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'Class name (i.e.: Status)',
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Regex(
                        [
                            'pattern' => '/^[a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*$/',
                            'message' => 'Invalid class name',
                        ]
                    ),
                ],
            ]
        )->add(
            'namespace',
            PhpNamespaceType::class
        )->addModelTransformer(
            new CallbackTransformer(
                function (ClassName $className = null) {
                    return new ClassNameDataTransferObject($className);
                },
                function (ClassNameDataTransferObject $classNameDataTransferObject) {
                    return ClassName::fromDataTransferObject($classNameDataTransferObject);
                }
            )
        );
        if ($options['ask_alias']) {
            $builder->add(
                'alias',
                TextType::class,
                [
                    'label' => 'Alias (not required)',
                    'required' => false,
                    'constraints' => [
                        new NotBlank(),
                        new Regex(
                            [
                                'pattern' => '/^[a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*$/',
                                'message' => 'Invalid class name',
                            ]
                        ),
                    ],
                ]
            );
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ClassNameDataTransferObject::class,
                'label' => 'Class name',
                'required' => true,
                'ask_alias' => false,
            ]
        );
    }
}
