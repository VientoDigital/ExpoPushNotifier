<?php
namespace VientoDigital\ExpoPushNotifier;
 
use Exception;
 
class ExpoPushNotifierException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Invalid token');
    }
}