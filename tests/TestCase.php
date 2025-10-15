<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Tests;

use Iamgerwin\NovaReusableBlocks\NovaReusableBlocksServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            NovaReusableBlocksServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
