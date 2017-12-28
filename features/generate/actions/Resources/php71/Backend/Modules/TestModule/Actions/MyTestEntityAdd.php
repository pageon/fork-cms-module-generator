<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionAdd;

class MyTestEntityAdd extends ActionAdd
{
    public function execute(): void
    {
        parent::execute();
        $this->parse();
        $this->display();
    }
}
