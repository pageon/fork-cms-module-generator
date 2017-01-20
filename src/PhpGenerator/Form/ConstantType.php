<?php

namespace ModuleGenerator\PhpGenerator\Form;

use ModuleGenerator\PhpGenerator\DataTransferObject\ConstantDataTransferObject;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

final class ConstantType extends MemberType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // constants only get visibility in php 7.1 and fork runs on 7.0
        $builder->remove('visibility');
        $builder->add(
            'value',
            $options['type_class_name'],
            [
                'label' => $options['value_label'],
                'required' => true,
                'constraints' => $options['value_constraints'],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(
            [
                'data_class' => ConstantDataTransferObject::class,
                'label' => 'Constant',
                'type_class_name' => TextType::class,
                'required' => true,
                'value_label' => 'Value',
                'value_constraints' => [
                    new NotBlank(),
                ],
            ]
        );
    }
}
