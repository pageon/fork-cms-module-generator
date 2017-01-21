<?php

namespace ModuleGenerator\PhpGenerator\Visibility;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class VisibilityType extends ChoiceType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(
            [
                'label' => 'Visibility',
                'data' => Visibility::visibilityPrivate(),
                'required' => true,
                'choices' => array_map(
                    function ($visibility) {
                        return Visibility::fromString($visibility);
                    },
                    Visibility::getPossibleValues()
                ),
                'choices_as_values' => true,
                'choice_value' => function (Visibility $visibility) {
                    return (string) $visibility;
                },
            ]
        );
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
