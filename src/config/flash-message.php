<?php

return [

    /**
     *  Types are used to name classes in html code of alerts but also to name traits.
     */
    'types' => ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'],

    /**
     *  Macro suffix is added after name of type of alert
     *  for example - successMsg.
     */
    'macro' => [
        'suffix' => 'Msg',
    ],

    /**
     * Class suffix is added to type of alert.
     */
    'class' => [
        'prefix' => 'alert-',
        'suffix' => '',
    ],

];
