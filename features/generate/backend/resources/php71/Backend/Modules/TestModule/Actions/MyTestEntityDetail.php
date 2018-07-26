<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;

final class MyTestEntityDetail extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();

        $myTestEntity = $this->getMyTestEntity();

        if (!$myTestEntity instanceof MyTestEntity) {
            $this->redirect($this->getBackLink(['error' => 'non-existing']));
        }

        $this->template->assign('myTestEntity', $myTestEntity);
        $this->parse();
        $this->display();
    }

    private function getMyTestEntity(): ?MyTestEntity
    {
        return $this->get(MyTestEntityRepository::class)->find($this->getRequest()->query->getInt('id'));
    }
}
