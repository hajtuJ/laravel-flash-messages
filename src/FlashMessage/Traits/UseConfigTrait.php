<?php

namespace FlashMessages\FlashMessage\Traits;

use FlashMessages\FlashMessageContract;

trait UseConfigTrait
{

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return app()->get('config')[FlashMessageContract::NAMESPACE];
    }

}
