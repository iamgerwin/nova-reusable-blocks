<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NovaReusableBlocksServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('nova-reusable-blocks');
    }
}
