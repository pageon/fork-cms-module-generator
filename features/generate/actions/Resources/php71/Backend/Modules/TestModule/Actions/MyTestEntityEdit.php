<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionEdit;

class MyTestEntityEdit extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();
        $this->parse();
        $this->display();
    }
}
