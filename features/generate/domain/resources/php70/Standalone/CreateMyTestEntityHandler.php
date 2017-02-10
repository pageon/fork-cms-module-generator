<?php

namespace Standalone;

use Standalone\MyTestEntity;
use Standalone\MyTestEntityRepository;

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
