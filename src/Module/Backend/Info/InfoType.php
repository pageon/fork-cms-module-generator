<?php

namespace ModuleGenerator\Module\Backend\Info;

use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use ModuleGenerator\PhpGenerator\SemVer\SemVerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use vierbergenlars\SemVer\version;

final class InfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'moduleName',
            ModuleNameType::class
        )->add(
            'moduleVersion',
            SemVerType::class,
            [
                'label' => 'Module version',
            ]
        )->add(
            'moduleVersion',
            SemVerType::class,
            [
                'label' => 'Module version',
            ]
        )->add(
            'minimumForkVersion',
            SemVerType::class,
            [
                'label' => 'Minimum fork version',
                'data' => new version('4.5.0'),
            ]
        )->add(
            'moduleDescription',
            TextType::class,
            [
                'label' => 'Module description',
                'constraints' => [
                    new NotBlank(),
                ],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => InfoDataTransferObject::class,
                'label' => 'Module info',
                'required' => true,
            ]
        );
    }
}
