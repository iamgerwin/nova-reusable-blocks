<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Iamgerwin\NovaReusableBlocks\Enums\ButtonColorPalette;
use Iamgerwin\NovaReusableBlocks\Enums\ButtonSize;
use Iamgerwin\NovaReusableBlocks\Enums\ButtonTarget;
use Iamgerwin\NovaReusableBlocks\Enums\ButtonVariant;
use Iamgerwin\NovaReusableBlocks\Enums\ContentPosition;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;

class CarouselSlideItem
{
    /**
     * Create the carousel slide layout
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function make(): array
    {
        return [
            'Carousel Slide',
            'carousel-slide',
            [
                static::imageField(),

                Text::make('Title', 'title')
                    ->help('Optional title for this slide'),

                Textarea::make('Description', 'description')
                    ->rows(3)
                    ->help('Optional description text for this slide'),

                Text::make('Button Text', 'button_text')
                    ->help('Text for the CTA button (leave empty to hide button)'),

                URL::make('Button Link', 'button_link')
                    ->help('URL for the CTA button'),

                Select::make('Button Target', 'button_target')
                    ->options(ButtonTarget::options())
                    ->default(ButtonTarget::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? ButtonTarget::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('How to open the link (Default: '.ButtonTarget::default()->label().')'),

                Select::make('Button Size', 'button_size')
                    ->options(ButtonSize::options())
                    ->default(ButtonSize::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? ButtonSize::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Size of the button (Default: '.ButtonSize::default()->label().')'),

                Select::make('Button Color Palette', 'button_color_palette')
                    ->options(ButtonColorPalette::options())
                    ->default(ButtonColorPalette::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? ButtonColorPalette::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Color palette for the button (Default: '.ButtonColorPalette::default()->label().')'),

                Select::make('Button Variant', 'button_variant')
                    ->options(ButtonVariant::options())
                    ->default(ButtonVariant::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? ButtonVariant::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Button variant style (Default: '.ButtonVariant::default()->label().')'),

                Select::make('Content Position', 'content_position')
                    ->options(ContentPosition::options())
                    ->default(ContentPosition::default()->value)
                    ->resolveUsing(function ($value) {
                        return $value ?? ContentPosition::default()->value;
                    })
                    ->displayUsingLabels()
                    ->help('Position of content overlay on this slide (Default: '.ContentPosition::default()->label().')'),

                Text::make('Alt Text', 'alt_text')
                    ->help('Alternative text for accessibility'),
            ],
        ];
    }

    /**
     * Get the image field - can be overridden if MediaHub is installed
     *
     * @return mixed
     */
    protected static function imageField()
    {
        // Check if NovaMediaHub is installed
        if (class_exists(\Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::class)) {
            return \Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::make('Slide Image', 'media_slide_image')
                ->nullable()
                ->help('Upload the image for this slide');
        }

        // Fallback to regular Image field
        return Image::make('Slide Image', 'slide_image')
            ->nullable()
            ->disk('public')
            ->help('Upload the image for this slide');
    }
}
