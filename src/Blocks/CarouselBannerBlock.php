<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Iamgerwin\NovaReusableBlocks\Enums\CarouselAspectRatio;
use Iamgerwin\NovaReusableBlocks\Enums\CarouselWidth;
use Iamgerwin\NovaReusableBlocks\Enums\TransitionEffect;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Flexible;

class CarouselBannerBlock
{
    /**
     * Create the carousel banner section
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function section(): array
    {
        return [
            'Carousel Banner',
            'carousel-banner',
            [
                Flexible::make('Slides', 'slides')
                    ->addLayout(...CarouselSlideItem::make())
                    ->button('Add Slide')
                    ->help('Add and configure individual slides with images, text, and CTAs'),

                Text::make('Banner Title', 'banner_title')
                    ->help('Optional overall title for the carousel banner'),

                Textarea::make('Banner Description', 'banner_description')
                    ->help('Optional overall description text for the carousel'),

                Boolean::make('Auto Play', 'auto_play')
                    ->default(true)
                    ->resolveUsing(function ($value) {
                        return $value ?? true;
                    })
                    ->help('Enable automatic slide transition (Default: enabled)'),

                Number::make('Auto Play Speed (ms)', 'auto_play_speed')
                    ->default(5000)
                    ->min(1000)
                    ->max(10000)
                    ->step(500)
                    ->resolveUsing(function ($value) {
                        return $value ?? 5000;
                    })
                    ->help('Time between slide transitions (Default: 5000ms, Min: 1000ms, Max: 10000ms)'),

                Boolean::make('Show Navigation', 'show_navigation')
                    ->default(true)
                    ->resolveUsing(function ($value) {
                        return $value ?? true;
                    })
                    ->help('Show navigation arrows (Default: enabled)'),

                Boolean::make('Show Dots', 'show_dots')
                    ->default(true)
                    ->resolveUsing(function ($value) {
                        return $value ?? true;
                    })
                    ->help('Show pagination dots (Default: enabled)'),

                Select::make('Transition Effect', 'transition_effect')
                    ->options(TransitionEffect::options())
                    ->default(TransitionEffect::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? TransitionEffect::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Animation style for slide transitions (Default: '.TransitionEffect::default()->label().')'),

                Number::make('Transition Speed (ms)', 'transition_speed')
                    ->default(300)
                    ->min(100)
                    ->max(2000)
                    ->step(100)
                    ->resolveUsing(function ($value) {
                        return $value ?? 300;
                    })
                    ->help('Speed of slide transition (Default: 300ms, Min: 100ms, Max: 2000ms)'),

                Boolean::make('Pause on Hover', 'pause_on_hover')
                    ->default(true)
                    ->resolveUsing(function ($value) {
                        return $value ?? true;
                    })
                    ->help('Pause auto play when hovering over carousel (Default: enabled)'),

                Select::make('Aspect Ratio', 'aspect_ratio')
                    ->options(CarouselAspectRatio::options())
                    ->default(CarouselAspectRatio::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? CarouselAspectRatio::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Aspect ratio for the carousel (Default: '.CarouselAspectRatio::default()->label().')'),

                Select::make('Width', 'width')
                    ->options(CarouselWidth::options())
                    ->default(CarouselWidth::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? CarouselWidth::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Carousel width setting (Default: '.CarouselWidth::default()->label().')'),
            ],
        ];
    }
}
