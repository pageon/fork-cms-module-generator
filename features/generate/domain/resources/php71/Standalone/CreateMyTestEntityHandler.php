<?php

namespace Standalone;

use Standalone\MyTestEntity;
use Standalone\MyTestEntityRepository;

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
