<?php

declare(strict_types=1);

use Iamgerwin\NovaReusableBlocks\Blocks\CarouselBannerBlock;
use Iamgerwin\NovaReusableBlocks\Section;

it('returns a result from all() method', function () {
    if (! class_exists('Whitecube\NovaFlexibleContent\Flexible')) {
        expect(true)->toBeTrue();

        return;
    }

    $flexible = Section::all();
    expect($flexible)->toBeObject();
})->skip('Nova Flexible Content not installed in test environment');

it('accepts custom field name', function () {
    if (! class_exists('Whitecube\NovaFlexibleContent\Flexible')) {
        expect(true)->toBeTrue();

        return;
    }

    $flexible = Section::all('custom_field');
    expect($flexible)->toBeObject();
})->skip('Nova Flexible Content not installed in test environment');

it('can hide create button', function () {
    if (! class_exists('Whitecube\NovaFlexibleContent\Flexible')) {
        expect(true)->toBeTrue();

        return;
    }

    $flexible = Section::all('data', true);
    expect($flexible)->toBeObject();
})->skip('Nova Flexible Content not installed in test environment');

it('includes carousel banner block by default', function () {
    if (! class_exists('Whitecube\NovaFlexibleContent\Flexible')) {
        expect(true)->toBeTrue();

        return;
    }

    $blocks = (new class extends Section
    {
        public static function getBlocks(): array
        {
            return self::getDefaultBlocks();
        }
    })::getBlocks();

    expect($blocks)->toBeArray()
        ->not->toBeEmpty();

    // Check that at least one block is carousel banner
    $hasCarouselBanner = false;
    foreach ($blocks as $block) {
        if ($block[1] === 'carousel-banner') {
            $hasCarouselBanner = true;
            break;
        }
    }

    expect($hasCarouselBanner)->toBeTrue();
})->skip('Nova Flexible Content not installed in test environment');

it('can register a custom block', function () {
    $block = Section::registerBlock('Test Block', 'test-block', []);

    expect($block)->toBeArray()
        ->toHaveCount(3)
        ->and($block[0])->toBe('Test Block')
        ->and($block[1])->toBe('test-block')
        ->and($block[2])->toBe([]);
});

it('carousel banner block returns proper structure', function () {
    if (! class_exists('Whitecube\NovaFlexibleContent\Flexible')) {
        expect(true)->toBeTrue();

        return;
    }

    $section = CarouselBannerBlock::section();

    expect($section)->toBeArray()
        ->toHaveCount(3)
        ->and($section[0])->toBe('Carousel Banner')
        ->and($section[1])->toBe('carousel-banner')
        ->and($section[2])->toBeArray();
})->skip('Nova Flexible Content not installed in test environment');
