<?php

namespace ModuleGenerator\PhpGenerator\DataTransferObject;

abstract class MemberDataTransferObject
{
    /** @var string */
    public $name;

    /** @var string|null public|protected|private */
    public $visibility;

    /** @var string|null */
    public $comment;
}
