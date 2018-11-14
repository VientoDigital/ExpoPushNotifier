<?php

if (!function_exists('enoti')) {
    /**
     * Get the Debugbar instance
     *
     * @return \VientoDigital\ExpoPushNotifier
     */
    function enoti()
    {
        return app('expopushnotifier');
    }
}