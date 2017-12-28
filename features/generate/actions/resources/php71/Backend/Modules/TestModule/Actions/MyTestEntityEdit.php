<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Form\Type\DeleteType;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;

class MyTestEntityEdit extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();

        $this->loadDeleteForm($myTestEntity); // Replace this with a real entity

        $this->parse();
        $this->display();
    }

    private function loadDeleteForm(MyTestEntity $myTestEntity): void
    {
        $deleteForm = $this->createForm(
            DeleteType::class,
            ['id' => $myTestEntity->getId()],
            ['module' => $this->getModule()]
        );

        $this->template->assign('deleteForm', $deleteForm->createView());
    }
}
