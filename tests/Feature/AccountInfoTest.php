<?php

namespace Jetimob\RDStation\Tests\Feature;

use Jetimob\RDStation\Facade\RDStation;
use Jetimob\RDStation\ObjectMapping\AccountInfo;
use Jetimob\RDStation\Tests\AuthzBase;

class AccountInfoTest extends AuthzBase
{
    /** @test */
    public function account_info_request(): void
    {
        /** @var AccountInfo $response */
        $response = RDStation::getAccountInfo();

        self::assertNotEmpty($response);
        self::assertInstanceOf(AccountInfo::class, $response);
        self::assertNotEmpty($response->getName());
        print_r($response->getName());
    }
}
