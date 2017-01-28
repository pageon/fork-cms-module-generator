<?php

namespace ModuleGenerator\Domain\Command;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RepositoryType extends ClassNameType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'label' => 'Entity class name',
                'name_label' => 'Entity class name',
                'namespace_label' => 'Entity namespace (i.e.: Backend\Modules\MyModule\Domain\MyEntity)',
            ]
        );
    }
}
