<?php

namespace ModuleGenerator\Module\Backend\Actions;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackendSettingsActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'moduleName',
                ModuleNameType::class
            )
            ->add(
                'settingClassName',
                ClassNameType::class,
                [
                    'label' => 'Setting class name',
                    'name_label' => 'Setting class name',
                    'namespace_label' => 'Setting namespace (i.e.: Backend\\Modules\\MyModule\\Domain\\Settings)',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => BackendSettingsActionDataTransferObject::class]);
    }
}
