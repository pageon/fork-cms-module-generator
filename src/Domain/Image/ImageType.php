<?php

namespace ModuleGenerator\Domain\Image;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use ModuleGenerator\PhpGenerator\Constant\ConstantType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Valid;

final class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'className',
                ClassNameType::class
            )->add(
                'maxFileSize',
                TextType::class,
                [
                    'label' => 'Max file size',
                ]
            )->add(
                'mimeTypes',
                TextType::class,
                [
                    'label' => 'Allowed mime types',
                ]
            )->add(
                'mimeTypeErrorMessage',
                TextType::class,
                [
                    'label' => 'Error message when wrong mime type is passed',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ImageDataTransferObject::class,
            ]
        );
    }
}
