<?php

namespace ModuleGenerator\Domain\DataGrid;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

final class DataGridType extends AbstractType
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
            )->add(
                'tableName',
                TextType::class,
                [
                    'label' => 'Table name',
                    'constraints' => [
                        new Regex(
                            [
                                'pattern' => '/^[\p{L}_][\p{L}\p{N}@$#_]{0,127}$/',
                                'message' => 'Invalid database table name',
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
                'data_class' => DataGridDataTransferObject::class,
            ]
        );
    }
}
