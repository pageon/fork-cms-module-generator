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

    /**
     * @return string
     */
    public function getType()
    {
        // for historical reasons "double" is returned in case of a float,
        // and not simply "float" from the function gettype.
        // we make sure we return float instead of double :)
        return str_replace('double', 'float', gettype($this->getValue()));
    }
}
