<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionDelete;
use Backend\Core\Engine\Model as BackendModel;
use Backend\Form\Type\DeleteType;
use Backend\Modules\TestModule\Domain\MyTestEntity\Command\DeleteMyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;

class MyTestEntityDelete extends ActionDelete
{
    public function execute(): void
    {
        $myTestEntity = $this->getMyTestEntity();
        if (!$myTestEntity instanceof MyTestEntity) {
            $this->redirect(BackendModel::createUrlForAction('MyTestEntityIndex', null, null, ['error' => 'non-existing']));

            return;
        }

        $this->get('command_bus')->handle(new DeleteMyTestEntity($myTestEntity));

        $this->redirect($this->getBackLink(['report' => 'deleted', 'var' => $myTestEntity->getTitle()]));
    }

    private function getBackLink(array $parameters = []): string
    {
        return BackendModel::createUrlForAction(
            'MyTestEntityIndex',
            null,
            null,
            $parameters
        );
    }

    private function getMyTestEntity(): ?MyTestEntity
    {
        $deleteForm = $this->createForm(DeleteType::class, null, ['module' => $this->getModule()]);
        $deleteForm->handleRequest($this->getRequest());

        if (!$deleteForm->isSubmitted() || !$deleteForm->isValid()) {
            return null;
        }

        $this->get(MyTestEntityRepository::class)->find($deleteForm->getData()['id']);
    }
}
