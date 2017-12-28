<?php

namespace ModuleGenerator\Domain\Actions;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CRUDActionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'moduleName',
                ModuleNameType::class
            )
            ->add(
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
                'data_class' => CRUDActionsDataTransferObject::class,
            ]
        );
    }
}
