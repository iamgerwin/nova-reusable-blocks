<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class ImageDividerBlock
{
    /**
     * Create the image divider section
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function section(): array
    {
        return [
            'Image Divider Block',
            'image-divider-block',
            [
                Select::make('Layout', 'layout')
                    ->options(static::getLayoutOptions())
                    ->displayUsingLabels()
                    ->help('Choose the layout style'),

                Textarea::make('Title', 'title')
                    ->rows(2)
                    ->help('Main heading text'),

                Text::make('Subtitle', 'subtitle')
                    ->help('Secondary text or tagline'),

                Text::make('Button Label', 'button_label')
                    ->help('Text for the call-to-action button'),

                Text::make('Button Link', 'button_link')
                    ->help('URL for the button'),

                static::imageField(),
            ],
        ];
    }

    /**
     * Get layout options
     *
     * @return array<string, string>
     */
    protected static function getLayoutOptions(): array
    {
        return [
            'layout_1' => 'Layout 1 - Image Left',
            'layout_2' => 'Layout 2 - Image Right',
        ];
    }

    /**
     * Get the image field
     *
     * @return mixed
     */
    protected static function imageField()
    {
        if (class_exists(\Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::class)) {
            return \Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::make('Image', 'media_image_url')
                ->nullable()
                ->help('Upload the divider image');
        }

        return Image::make('Image', 'image')
            ->nullable()
            ->disk('public')
            ->help('Upload the divider image');
    }
}
