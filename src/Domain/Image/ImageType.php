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
                    'data' => $options['max_file_size'],
                ]
            )->add(
                'mimeTypes',
                TextType::class,
                [
                    'label' => 'Allowed mime types',
                    'data' => $options['mime_types'],
                ]
            )->add(
                'mimeTypeErrorMessage',
                TextType::class,
                [
                    'label' => 'Error message when wrong mime type is passed',
                    'data' => $options['mime_type_error_message'],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ImageDataTransferObject::class,
                'max_file_size' => '2M',
                'mime_types' => '{"image/jpeg", "image/gif", "image/png"}',
                'mime_type_error_message' => 'err.JPGGIFAndPNGOnly',
            ]
        );
    }
}
