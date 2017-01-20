<?php

namespace ModuleGenerator\PhpGenerator\Form;

use ModuleGenerator\PhpGenerator\DataTransferObject\NamespaceDataTransferObject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

final class NamespaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'Namespace (i.e.: \\Console\\ValueObject)',
                'required' => true,
                'constraints' => [
                    new Regex(['pattern' => '/^(?:\\\w+|\w+\\)(?:\w+\\?\w+)+$/', 'message' => 'Invalid namespace']),
                ],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(
            [
                'data_class' => NamespaceDataTransferObject::class,
                'label' => false,
                'required' => true,
            ]
        );
    }
}
