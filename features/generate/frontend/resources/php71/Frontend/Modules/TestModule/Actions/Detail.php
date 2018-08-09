<?php

namespace Frontend\Modules\TestModule\Actions;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository;
use Frontend\Core\Engine\Base\Block;
use Frontend\Core\Language\Locale;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class Detail extends Block
{
    public function execute(): void
    {
        parent::execute();

        $this->loadTemplate();

        $this->template->assign('myTestEntity', $this->getMyTestEntity());
    }

    private function getMyTestEntity(): MyTestEntity
    {
        if ($this->url->getParameter(0) === null) {
            throw new NotFoundHttpException();
        }

        $myTestEntity = $this->get(MyTestEntityRepository::class)->findBySlugAndLocale(
            $this->url->getParameter(0),
            Locale::frontendLanguage()
        );

        if ($myTestEntity === null) {
            throw new NotFoundHttpException();
        }

        return $myTestEntity;
    }
}
