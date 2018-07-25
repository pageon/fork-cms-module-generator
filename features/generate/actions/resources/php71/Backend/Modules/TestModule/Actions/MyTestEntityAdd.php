<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionAdd;
use Backend\Core\Language\Locale;
use Backend\Modules\TestModule\Domain\MyTestEntity\Command\CreateMyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityType;
use Backend\Core\Engine\Model as BackendModel;
use Symfony\Component\Form\Form;

class MyTestEntityAdd extends ActionAdd
{
    public function execute(): void
    {
        parent::execute();

        $form = $this->getForm();

        if (!$form->isSubmitted() || !$form->isValid()) {
            $this->template->assign('form', $form->createView());

            $this->parse();
            $this->display();

            return;
        }

        $this->handleForm($form);
    }

    private function handleForm(Form $form): void
    {
        $createMyTestEntity = $form->getData();

        $this->get('command_bus')->handle($createMyTestEntity);

        $this->redirect(
            $this->getBackLink(
                [
                    'report' => 'added',
                    'var' => $createMyTestEntity->title,
                ]
            )
        );
    }

    private function getForm(): Form
    {
        $form = $this->createForm(MyTestEntityType::class, new CreateMyTestEntity(Locale::workingLocale()));

        $form->handleRequest($this->getRequest());

        return $form;
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
}
