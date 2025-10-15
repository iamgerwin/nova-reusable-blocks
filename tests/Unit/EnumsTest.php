<?php

declare(strict_types=1);

use Iamgerwin\NovaReusableBlocks\Enums\ButtonColorPalette;
use Iamgerwin\NovaReusableBlocks\Enums\ButtonSize;
use Iamgerwin\NovaReusableBlocks\Enums\ButtonTarget;
use Iamgerwin\NovaReusableBlocks\Enums\ButtonVariant;
use Iamgerwin\NovaReusableBlocks\Enums\CarouselAspectRatio;
use Iamgerwin\NovaReusableBlocks\Enums\CarouselWidth;
use Iamgerwin\NovaReusableBlocks\Enums\ContentPosition;
use Iamgerwin\NovaReusableBlocks\Enums\TransitionEffect;

describe('ButtonColorPalette enum', function () {
    it('has correct default value', function () {
        expect(ButtonColorPalette::default())->toBe(ButtonColorPalette::Light);
    });

    it('returns correct labels', function () {
        expect(ButtonColorPalette::Light->label())->toBe('Light');
        expect(ButtonColorPalette::LightText->label())->toBe('Light Text');
        expect(ButtonColorPalette::Dark->label())->toBe('Dark');
    });

    it('returns options as array', function () {
        $options = ButtonColorPalette::options();
        expect($options)->toBeArray()
            ->toHaveKey('light')
            ->toHaveKey('light-text')
            ->toHaveKey('dark');
    });
});

describe('ButtonSize enum', function () {
    it('has correct default value', function () {
        expect(ButtonSize::default())->toBe(ButtonSize::Large);
    });

    it('returns correct labels', function () {
        expect(ButtonSize::Small->label())->toBe('Small');
        expect(ButtonSize::Large->label())->toBe('Large');
    });
});

describe('ButtonTarget enum', function () {
    it('has correct default value', function () {
        expect(ButtonTarget::default())->toBe(ButtonTarget::SELF);
    });

    it('returns correct labels', function () {
        expect(ButtonTarget::SELF->label())->toBe('Same Window');
        expect(ButtonTarget::BLANK->label())->toBe('New Window');
    });
});

describe('ButtonVariant enum', function () {
    it('has correct default value', function () {
        expect(ButtonVariant::default())->toBe(ButtonVariant::Outline);
    });

    it('returns correct labels', function () {
        expect(ButtonVariant::Outline->label())->toBe('Outline');
        expect(ButtonVariant::Underline->label())->toBe('Underline');
    });
});

describe('CarouselAspectRatio enum', function () {
    it('has correct default value', function () {
        expect(CarouselAspectRatio::default())->toBe(CarouselAspectRatio::RATIO_16_9);
    });

    it('returns correct labels', function () {
        expect(CarouselAspectRatio::RATIO_16_9->label())->toContain('16:9');
        expect(CarouselAspectRatio::RATIO_21_9->label())->toContain('21:9');
        expect(CarouselAspectRatio::RATIO_3_1->label())->toContain('3:1');
    });
});

describe('CarouselWidth enum', function () {
    it('has correct default value', function () {
        expect(CarouselWidth::default())->toBe(CarouselWidth::NORMAL_WIDTH);
    });

    it('returns correct values', function () {
        expect(CarouselWidth::FULL_WIDTH->value)->toBe('full_width');
        expect(CarouselWidth::NORMAL_WIDTH->value)->toBe('normal_width');
    });
});

describe('ContentPosition enum', function () {
    it('has correct default value', function () {
        expect(ContentPosition::default())->toBe(ContentPosition::CENTER);
    });

    it('has all position options', function () {
        $options = ContentPosition::options();
        expect($options)->toBeArray()
            ->toHaveCount(9)
            ->toHaveKey('center')
            ->toHaveKey('top-left')
            ->toHaveKey('bottom-right');
    });
});

describe('TransitionEffect enum', function () {
    it('has correct default value', function () {
        expect(TransitionEffect::default())->toBe(TransitionEffect::SLIDE);
    });

    it('has all transition effects', function () {
        $options = TransitionEffect::options();
        expect($options)->toBeArray()
            ->toHaveCount(6)
            ->toHaveKey('slide')
            ->toHaveKey('fade')
            ->toHaveKey('cube');
    });
});
