<?php

namespace ModuleGenerator\Module\Backend\Actions;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use ModuleGenerator\PhpGenerator\Parameter\ParameterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;

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
            )->add(
                'settings',
                CollectionType::class,
                [
                    'entry_type' => ParameterType::class,
                    'allow_add' => true,
                    'label' => 'Settings',
                    'constraints' => [
                        new Valid(),
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => BackendSettingsActionDataTransferObject::class]);
    }
}
