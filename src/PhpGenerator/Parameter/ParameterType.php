<?php

namespace ModuleGenerator\PhpGenerator\Parameter;

use ModuleGenerator\PhpGenerator\ParameterType\DBALType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ParameterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'Parameter name',
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Regex(
                        [
                            'pattern' => '/^[a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*$/',
                            'message' => 'Invalid parameter name',
                        ]
                    ),
                ],
            ]
        )->add(
            'dbalType',
            ChoiceType::class,
            [
                'label' => 'DBAL type',
                'choices' => array_map(
                    function ($dbalType) {
                        return new DBALType($dbalType);
                    },
                    DBALType::POSSIBLE_VALUES
                ),
                'choices_as_values' => true,
                'choice_translation_domain' => false,
                'data' => DBALType::string(),
            ]
        )->add(
            'nullable',
            ChoiceType::class,
            [
                'label' => 'Nullable',
                'data' => false,
                'choices' => [
                    true => 'Y',
                    false => 'N',
                ],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ParameterDataTransferObject::class,
                'label' => 'Parameter',
                'required' => true,
                'error_bubbling' => false,
            ]
        );
    }
}
