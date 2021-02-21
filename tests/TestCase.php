<?php

namespace Jetimob\RDStation\Tests;

use Jetimob\Http\HttpServiceProvider;
use Jetimob\RDStation\RDStationServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [RDStationServiceProvider::class, HttpServiceProvider::class];
    }
}
