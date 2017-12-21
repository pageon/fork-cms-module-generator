<?php

namespace Standalone;

use Standalone\MyTestEntityRepository;

final class DeleteMyTestEntityHandler
{
    /** @var MyTestEntityRepository */
    private $myTestEntityRepository;

    public function __construct(MyTestEntityRepository $myTestEntityRepository)
    {
        $this->myTestEntityRepository = $myTestEntityRepository;
    }

    public function handle(DeleteMyTestEntity $deleteMyTestEntity): void
    {
        $this->myTestEntityRepository->remove($deleteMyTestEntity->getMyTestEntity());
    }
}
