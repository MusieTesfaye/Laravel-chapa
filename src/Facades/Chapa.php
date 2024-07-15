<?php

namespace Musie\LaravelChapa\Facades;

use Illuminate\Support\Facades\Facade;

class Chapa extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chapa';
    }
}
