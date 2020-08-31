<?php

namespace FlashMessages\FlashMessage;

use FlashMessages\FlashMessage\Traits\UseConfigTrait as WithConfig;
use Illuminate\Support\Str;

/**
 * Class MessageMacro.
 */
class MessageMacroFactory
{
    use WithConfig;

    public function getName(string $type): string
    {
        $config = $this->getConfig();

        $type = empty($config['macro']['prefix']) ? $type : Str::ucfirst($type);
        $prefix = $config['macro']['prefix'];
        $suffix = Str::ucfirst($config['macro']['suffix']);

        return $prefix.$type.$suffix;
    }
}
