<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionIndex;
use Backend\Core\Language\Locale;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityDataGrid;

final class MyTestEntityIndex extends ActionIndex
{
    public function execute(): void
    {
        parent::execute();

        $this->template->assign('dataGrid', MyTestEntityDataGrid::getHtml(Locale::workingLocale()));

        $this->parse();
        $this->display();
    }
}
