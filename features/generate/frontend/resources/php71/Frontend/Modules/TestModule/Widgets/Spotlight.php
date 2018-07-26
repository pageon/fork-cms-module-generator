<?php

namespace Frontend\Modules\TestModule\Widgets;

use Frontend\Core\Engine\Base\Widget;

final class Spotlight extends Widget
{
    public function execute(): void
    {
        parent::execute();

        $this->loadTemplate();

        $this->template->assign('hello', 'hello world');
    }
}
