<?php

declare(strict_types=1);

use Iamgerwin\NovaReusableBlocks\Blocks\CarouselBannerBlock;
use Iamgerwin\NovaReusableBlocks\Section;
use Whitecube\NovaFlexibleContent\Flexible;

it('returns a Flexible instance from all() method', function () {
    $flexible = Section::all();

    expect($flexible)->toBeInstanceOf(Flexible::class);
});

it('accepts custom field name', function () {
    $flexible = Section::all('custom_field');

    expect($flexible)->toBeInstanceOf(Flexible::class);
});

it('can hide create button', function () {
    $flexible = Section::all('data', true);

    expect($flexible)->toBeInstanceOf(Flexible::class);
});

it('includes carousel banner block by default', function () {
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
});

it('can register a custom block', function () {
    $block = Section::registerBlock('Test Block', 'test-block', []);

    expect($block)->toBeArray()
        ->toHaveCount(3)
        ->and($block[0])->toBe('Test Block')
        ->and($block[1])->toBe('test-block')
        ->and($block[2])->toBe([]);
});

it('carousel banner block returns proper structure', function () {
    $section = CarouselBannerBlock::section();

    expect($section)->toBeArray()
        ->toHaveCount(3)
        ->and($section[0])->toBe('Carousel Banner')
        ->and($section[1])->toBe('carousel-banner')
        ->and($section[2])->toBeArray();
});
