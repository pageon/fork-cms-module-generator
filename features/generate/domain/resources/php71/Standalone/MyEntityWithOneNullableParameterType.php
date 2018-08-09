<?php

namespace Standalone;

use Backend\Form\EventListener\AddMetaSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class MyEntityWithOneNullableParameterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'parameter1',
            TextType::class,
            [
                'label' => 'lbl.Parameter1',
                'required' => false,
            ]
        );

        // @TODO remove when entity doesn't use meta
        $builder->addEventSubscriber(
            new AddMetaSubscriber(
                '@TODO module name',
                '@TODO action name',
                MyEntityWithOneNullableParameterRepository::class,
                'getUrl',
                [
                    'getData.getLocale',
                    'getData.getId',
                ]
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => MyEntityWithOneNullableParameterDataTransferObject::class]);
    }
}
