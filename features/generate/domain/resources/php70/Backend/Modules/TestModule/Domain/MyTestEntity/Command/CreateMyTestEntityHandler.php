<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;

final class CreateMyTestEntityHandler
{
    /** @var MyTestEntityRepository */
    private $myTestEntityRepository;

    /**
     * @param MyTestEntityRepository $myTestEntityRepository
     */
    public function __construct(MyTestEntityRepository $myTestEntityRepository)
    {
        $this->myTestEntityRepository = $myTestEntityRepository;
    }

    /**
     * @param CreateMyTestEntity $createMyTestEntity
     */
    public function handle(CreateMyTestEntity $createMyTestEntity)
    {
        $this->myTestEntityRepository->add(
            MyTestEntity::fromDataTransferObject($createMyTestEntity)
        );
    }
}
