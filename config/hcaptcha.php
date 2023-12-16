<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Key
    |--------------------------------------------------------------------------
    |
    | This is your site key. By default, we use a test key that is for testing
    | purposes only and does not trigger a challenge.
    |
    */

    'sitekey' => env('HCAPTCHA_SITEKEY'),

    /*
    |--------------------------------------------------------------------------
    | Secret Key
    |--------------------------------------------------------------------------
    |
    | This is your site key. By default, we use a test key that is for testing
    | purposes only and does not trigger a challenge.
    |
    */

    'secret' => env('HCAPTCHA_SECRET'),

];
