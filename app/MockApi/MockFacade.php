<?php

use Illuminate\Support\Facades\Facade;

class MockFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MockApi';
    }
}