<?php

namespace Backend\Modules\TestModule\Actions;

use Backend\Core\Engine\Base\ActionDelete;
use Backend\Core\Engine\Model as BackendModel;

class MyTestEntityDelete extends ActionDelete
{
    public function execute(): void
    {
        parent::execute();

        // $this->redirect($this->getBackLink(['report' => 'deleted', 'var' => $this->record['title']]));

        $this->parse();
        $this->display();
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
