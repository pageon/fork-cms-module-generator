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
                    'name_label' => 'Command namespace (i.e.: Backend\\Modules\MyModule\Domain\MyEntity\Command)',
                ]
            )->add(
                'entityClassName',
                ClassNameType::class,
                [
                    'label' => 'Entity class name',
                    'name_label' => 'Entity class name',
                    'namespace_label' => 'Entity namespace (i.e.: Backend\\Modules\MyModule\Domain\MyEntity)',
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
