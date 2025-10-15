<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks;

use Iamgerwin\NovaReusableBlocks\Blocks\CarouselBannerBlock;
use Whitecube\NovaFlexibleContent\Flexible;

class Section
{
    /**
     * Get all available section blocks
     *
     * @param  string  $field  The field name for the flexible content
     * @param  bool  $hideCreate  Hide the add button until a resource is created
     * @return mixed
     */
    public static function all(
        string $field = 'data',
        bool $hideCreate = false
    ) {
        $flexible = Flexible::make('Page Content', $field)
            ->button('Add Blocks')
            ->menu('flexible-search-menu');

        foreach (static::getDefaultBlocks() as $block) {
            $flexible->addLayout($block[0], $block[1], $block[2]);
        }

        if ($hideCreate) {
            $flexible->canSee(function ($request) {
                return $request->resourceId !== null;
            });
        }

        return $flexible;
    }

    /**
     * Get the default blocks included in the package
     *
     * Override this method to add your own custom blocks or
     * remove default blocks.
     *
     * @return array<int, array{0: string, 1: string, 2: array<mixed>}>
     */
    protected static function getDefaultBlocks(): array
    {
        return [
            CarouselBannerBlock::section(),
        ];
    }

    /**
     * Register a custom block
     *
     * @param  string  $title  The display title
     * @param  string  $name  The slug/identifier
     * @param  array<mixed>  $fields  The Nova fields
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function registerBlock(string $title, string $name, array $fields): array
    {
        return [$title, $name, $fields];
    }
}
