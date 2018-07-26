<?php

namespace ModuleGenerator\Module\Frontend\Widgets;

use ModuleGenerator\PhpGenerator\WidgetName\WidgetNameType;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FrontendWidgetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'moduleName',
                ModuleNameType::class
            )
            ->add(
                'widgetName',
                WidgetNameType::class
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => FrontendWidgetDataTransferObject::class,
            ]
        );
    }
}
