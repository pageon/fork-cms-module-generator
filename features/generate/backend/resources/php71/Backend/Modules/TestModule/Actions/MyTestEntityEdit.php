<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Form\Type\DeleteType;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\Command\UpdateMyTestEntity;
use Backend\Core\Engine\Model as BackendModel;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityType;
use Symfony\Component\Form\Form;

final class MyTestEntityEdit extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();

        $myTestEntity = $this->getMyTestEntity();

        if (!$myTestEntity instanceof MyTestEntity) {
            $this->redirect($this->getBackLink(['error' => 'non-existing']));
        }

        $this->loadDeleteForm($myTestEntity);

        $form = $this->getForm($myTestEntity);

        if (!$form->isSubmitted() || !$form->isValid()) {
            $this->template->assign('form', $form->createView());
            $this->template->assign('myTestEntity', $myTestEntity);

            $this->parse();
            $this->display();

            return;
        }

        $this->handleForm($form);
    }

    private function loadDeleteForm(MyTestEntity $myTestEntity): void
    {
        $deleteForm = $this->createForm(
            DeleteType::class,
            ['id' => $myTestEntity->getId()],
            [
                'module' => $this->getModule(),
                'action' => 'MyTestEntityDelete',
            ]
        );

        $this->template->assign('deleteForm', $deleteForm->createView());
    }

    private function getForm(MyTestEntity $myTestEntity): Form
    {
        $form = $this->createForm(MyTestEntityType::class, new UpdateMyTestEntity($myTestEntity));

        $form->handleRequest($this->getRequest());

        return $form;
    }

    private function handleForm(Form $form): void
    {
        $updateMyTestEntity = $form->getData();

        $this->get('command_bus')->handle($updateMyTestEntity);

        $this->redirect(
            $this->getBackLink(
                [
                    'report' => 'edited',
                    'var' => $updateMyTestEntity->title,
                ]
            )
        );
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
        return $this->get(MyTestEntityRepository::class)->find($this->getRequest()->query->getInt('id'));
    }
}
