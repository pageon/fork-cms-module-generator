<?php

namespace ModuleGenerator\Module\Frontend\Actions;

use ModuleGenerator\PhpGenerator\ActionName\ActionNameType;
use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FrontendActionType extends AbstractType
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
            )
            ->add(
                'actionName',
                ActionNameType::class
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => FrontendActionDataTransferObject::class,
            ]
        );
    }
}
