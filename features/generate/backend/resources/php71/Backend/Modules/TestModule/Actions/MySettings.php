<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionIndex;
use Backend\Modules\TestModule\Domain\MySettings\Command\SaveMySettings;
use Backend\Modules\TestModule\Domain\MySettings\MySettingsType;
use Backend\Core\Engine\Model as BackendModel;
use Symfony\Component\Form\Form;

final class MySettings extends ActionIndex
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
        $saveMySettings = $form->getData();

        $this->get('command_bus')->handle($saveMySettings);

        $this->redirect(
            $this->getBackLink(
                [
                    'report' => 'saved',
                ]
            )
        );
    }

    private function getForm(): Form
    {
        $form = $this->createForm(MySettingsType::class, new SaveMySettings($this->get('fork.settings')));

        $form->handleRequest($this->getRequest());

        return $form;
    }

    private function getBackLink(array $parameters = []): string
    {
        return BackendModel::createUrlForAction(
            'MySettings',
            null,
            null,
            $parameters
        );
    }
}
