<?php

namespace ModuleGenerator\Domain\File;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class FileType extends AbstractType
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
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => FileDataTransferObject::class,
                'max_file_size' => '2M',
            ]
        );
    }
}
