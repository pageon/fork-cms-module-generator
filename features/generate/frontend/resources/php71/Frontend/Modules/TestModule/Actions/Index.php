<?php

namespace Frontend\Modules\TestModule\Actions;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;
use Frontend\Core\Engine\Base\Block;
use Frontend\Core\Language\Locale;

final class Index extends Block
{
    public function execute(): void
    {
        parent::execute();

        $this->loadTemplate();

        $this->template->assign(
            'myTestEntityCollection',
            $this->get(MyTestEntityRepository::class)->findByLocale(Locale::frontendLanguage())
        );
    }
}
