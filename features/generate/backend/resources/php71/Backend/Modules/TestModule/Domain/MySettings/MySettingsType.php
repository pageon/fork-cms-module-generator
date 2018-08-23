<?php

namespace Backend\Modules\TestModule\Domain\MySettings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Backend\Modules\TestModule\Domain\MySettings\Command\SaveMySettings;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class MySettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'firstName',
            TextType::class,
            [
                'label' => 'lbl.FirstName',
            ]
        );
        $builder->add(
            'lastName',
            TextType::class,
            [
                'label' => 'lbl.LastName',
                'required' => false,
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => SaveMySettings::class]);
    }
}
