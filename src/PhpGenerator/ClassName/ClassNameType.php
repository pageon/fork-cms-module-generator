<?php

namespace ModuleGenerator\PhpGenerator\ClassName;

use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespaceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ClassNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => $options['name_label'],
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
            PhpNamespaceType::class,
            [
                'name_label' => $options['namespace_label'],
            ]
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
                'name_label' => 'Class name (i.e.: Status)',
                'namespace_label' => 'Namespace (i.e.: Console\\ValueObject)',
            ]
        );
    }
}
