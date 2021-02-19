<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Allowed Controllers and Methods
    |--------------------------------------------------------------------------
    |   Allowed Controllers and Methods without Authorization
        Example :  contact-page , get JWT before sign in ,...
    |
    */
    'Controllers' => [
//        'mainController',
        'identityController',
    ],
    'Methods' => [
//        'get_all_articles',
        'user_authentication',

    ],
];