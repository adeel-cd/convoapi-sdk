<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Api Url
    |--------------------------------------------------------------------------
    |
    | This value is the url of your api. This value is used when the
    | library needs to place the api request on required api server.
    |
	*/

    'url' => 'https://codedistrict.dev.api.convoalert.com/ConvoAnnounce',

    /*
    |--------------------------------------------------------------------------
    | Api Version
    |--------------------------------------------------------------------------
    |
    | This value is the version of your api. This value is used when the
    | sdk needs to place the version for api in a request or
    | any other location as required by the application or its packages.
    |
	*/

    'version' => 'v1',

    'self_auth' => false,

    /*
    |--------------------------------------------------------------------------
    | Api Authentication Credentials
    |--------------------------------------------------------------------------
    |
    | This value is the authentication token of your account. This value is used when the
    | sdk needs to place the request for api calls or any other location as required
    | by the application or its packages. This token is required to call authorized apis
    |
	*/

    'user' => [
        'username' => null,
        'password' => null
    ]
];