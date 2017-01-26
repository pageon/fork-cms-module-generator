<?php

namespace ModuleGenerator\PhpGenerator\SemVer;

use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use vierbergenlars\SemVer\SemVerException;
use vierbergenlars\SemVer\version;

final class SemVerType extends TextType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->addModelTransformer(
            new CallbackTransformer(
                function (version $version = null) use ($options) {
                    return $version;
                },
                function (string $version) {
                    try {
                        return new version($version);
                    } catch (SemVerException $semVerException) {
                        throw new TransformationFailedException(
                            $semVerException->getMessage(),
                            $semVerException->getCode(),
                            $semVerException
                        );
                    }
                }
            )
        );
    }

    public function getParent(): string
    {
        return TextType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(
            [
                'label' => false,
                'required' => true,
                'invalid_message' => 'invalid semver version number',
                'data' => new version('1.0.0'),
            ]
        );
    }
}
