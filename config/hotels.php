<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The available providers.
    |--------------------------------------------------------------------------
    |
    | Here you may specify the available hotel providers to be used to
    | fetch and aggregate hotels.
    |
    | Note: The provider(s) must implement the \App\Hotels\Providers\Abstracts\HotelProvider interface.
    */
    'providers' => [
        \App\Hotels\Providers\BestHotelsProvider::class,
        \App\Hotels\Providers\CrazyHotelsProvider::class,
    ],
];
