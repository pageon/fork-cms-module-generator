<?php

namespace Standalone;

use Backend\Form\EventListener\AddMetaSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Backend\Form\Type\EditorType;
use Common\Form\ImageType;
use Common\Form\FileType;

final class FormEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'string',
            TextType::class,
            [
                'label' => 'lbl.String',
            ]
        );
        $builder->add(
            'boolean',
            CheckboxType::class,
            [
                'label' => 'lbl.Boolean',
            ]
        );
        $builder->add(
            'time',
            TimeType::class,
            [
                'label' => 'lbl.Time',
            ]
        );
        $builder->add(
            'date',
            DateType::class,
            [
                'label' => 'lbl.Date',
            ]
        );
        $builder->add(
            'datetime',
            DateTimeType::class,
            [
                'label' => 'lbl.Datetime',
            ]
        );
        $builder->add(
            'integer',
            IntegerType::class,
            [
                'label' => 'lbl.Integer',
            ]
        );
        $builder->add(
            'float',
            NumberType::class,
            [
                'label' => 'lbl.Float',
            ]
        );
        $builder->add(
            'text',
            EditorType::class,
            [
                'label' => 'lbl.Text',
            ]
        );
        $builder->add(
            'image',
            ImageType::class,
            [
                'label' => 'lbl.Image',
            ]
        );
        $builder->add(
            'file',
            FileType::class,
            [
                'label' => 'lbl.File',
            ]
        );

        // @TODO remove when entity doesn't use meta
        $builder->addEventSubscriber(
            new AddMetaSubscriber(
                '@TODO module name',
                '@TODO action name',
                FormEntityRepository::class,
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
        $resolver->setDefaults(['data_class' => FormEntityDataTransferObject::class]);
    }
}
