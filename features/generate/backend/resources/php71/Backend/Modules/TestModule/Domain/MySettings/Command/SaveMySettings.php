<?php

namespace Backend\Modules\TestModule\Domain\MySettings\Command;

use Common\ModulesSettings;
use Symfony\Component\Validator\Constraints as Assert;

final class SaveMySettings
{
    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $firstName;

    /**
     * @var string|null
     */
    public $lastName;

    public function __construct(ModulesSettings $modulesSettings)
    {
        $settings = $modulesSettings->getForModule('TestModule');

        $this->firstName = $settings['firstName'] ?? null;
        $this->lastName = $settings['lastName'] ?? null;
    }
}
