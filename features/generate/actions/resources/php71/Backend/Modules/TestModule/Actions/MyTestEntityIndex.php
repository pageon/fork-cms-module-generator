<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionIndex;

class MyTestEntityIndex extends ActionIndex
{
    public function execute(): void
    {
        parent::execute();
        $this->parse();
        $this->display();
    }
}
