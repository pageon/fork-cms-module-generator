<?php

namespace WidgetGenerator\PhpGenerator\WidgetName;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

final class WidgetNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'Widget name (i.e.: Spotlight)',
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Regex(
                        [
                            'pattern' => '/^[a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*$/',
                            'message' => 'Invalid widget name',
                        ]
                    ),
                ],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => WidgetNameDataTransferObject::class,
                'label' => false,
                'required' => true,
            ]
        );
    }
}
