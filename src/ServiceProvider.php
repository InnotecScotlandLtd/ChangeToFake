<?php

namespace InnotecScotlandLtd\ChangeToFake;

use InnotecScotlandLtd\ChangeToFake\Commands\FakeData;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->commands([
            FakeData::class,
        ]);
    }
}