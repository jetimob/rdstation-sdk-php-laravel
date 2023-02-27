<?php

namespace Jetimob\RDStation\Tests;

use Jetimob\Http\Authorization\OAuth\Storage\FileCacheRepository;
use Jetimob\RDStation\Facades\RDStation;
use Jetimob\RDStation\RDStationServiceProvider;
use Orchestra\Testbench\TestCase;

class AbtractTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        RDStation::getHttpInstance()->overwriteConfig(
            'oauth_access_token_repository',
            FileCacheRepository::class,
        );
    }

    protected function getPackageProviders($app): array
    {
        return [RDStationServiceProvider::class];
    }

}
