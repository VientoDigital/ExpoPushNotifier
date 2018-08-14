<?php

namespace VientoDigital\ExpoPushNotifier\Facades;

use Illuminate\Support\Facades\Facade;

class ExpoPushNotifier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'expopushnotifier';
    }
}
