<?php

namespace ModuleGenerator\PhpGenerator\Constant;

use Nette\PhpGenerator\Constant as NetteConstant;

final class Constant extends NetteConstant
{
    /**
     * @param ConstantDataTransferObject $constantDataTransferObject
     *
     * @return self
     */
    public static function fromDataTransferObject(ConstantDataTransferObject $constantDataTransferObject)
    {
        return (new self($constantDataTransferObject->name))
            ->setValue($constantDataTransferObject->value)
            ->setComment($constantDataTransferObject->comment)
            ->setVisibility($constantDataTransferObject->visibility);
    }
}
