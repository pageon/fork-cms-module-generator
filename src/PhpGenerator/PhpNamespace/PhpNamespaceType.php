<?php

namespace ModuleGenerator\PhpGenerator\PhpNamespace;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

final class PhpNamespaceType extends AbstractType
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
                            'pattern' => '/^(?:\\w+|\\w+\\\\)(?:\\w+\\\\?\\w+)+$/',
                            'message' => 'Invalid namespace',
                        ]
                    ),
                ],
                'error_bubbling' => true,
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => PhpNamespaceDataTransferObject::class,
                'label' => '',
                'required' => true,
                'constraints' => [
                    new Valid(),
                ],
                'error_bubbling' => false,
                'name_label' => 'Namespace (i.e.: Console\\ValueObject)',
            ]
        );
    }
}
