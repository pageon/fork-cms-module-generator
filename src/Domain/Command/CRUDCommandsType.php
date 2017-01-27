<?php

namespace ModuleGenerator\Domain\Command;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespaceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CRUDCommandsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'commandNamespace',
                PhpNamespaceType::class,
                [
                    'label' => 'Command namespace',
                ]
            )->add(
                'entityClassName',
                ClassNameType::class,
                [
                    'label' => 'Entity class name',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => CRUDCommandDataTransferObject::class,
            ]
        );
    }
}
