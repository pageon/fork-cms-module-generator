<?php

namespace ModuleGenerator\PhpGenerator\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class VisibilityType extends ChoiceType
{
    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PROTECTED = 'protected';
    const VISIBILITY_PRIVATE = 'private';

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(
            [
                'label' => 'Visibility',
                'choices' => [
                    self::VISIBILITY_PUBLIC,
                    self::VISIBILITY_PROTECTED,
                    self::VISIBILITY_PRIVATE,
                ],
                'data' => self::VISIBILITY_PRIVATE,
                'required' => true,
            ]
        );
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
