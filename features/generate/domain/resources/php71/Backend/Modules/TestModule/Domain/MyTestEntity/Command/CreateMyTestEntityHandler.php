<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;

final class CreateMyTestEntityHandler
{
    /** @var MyTestEntityRepository */
    private $myTestEntityRepository;

    public function __construct(MyTestEntityRepository $myTestEntityRepository)
    {
        $this->myTestEntityRepository = $myTestEntityRepository;
    }

    public function handle(CreateMyTestEntity $createMyTestEntity): void
    {
        $this->myTestEntityRepository->add(
            MyTestEntity::fromDataTransferObject($createMyTestEntity)
        );
    }
}
