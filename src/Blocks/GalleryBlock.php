<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;

class GalleryBlock
{
    /**
     * Create the gallery section
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function section(): array
    {
        return [
            'Gallery Block',
            'gallery-block',
            [
                Textarea::make('Title', 'title')
                    ->alwaysShow()
                    ->help('Gallery title or heading'),

                static::imagesField(),
            ],
        ];
    }

    /**
     * Get the images field - uses MediaHub if available
     *
     * @return mixed
     */
    protected static function imagesField()
    {
        // Check if NovaMediaHub is installed
        if (class_exists(\Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::class)) {
            return \Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::make('Images', 'media_images_url')
                ->multiple()
                ->nullable()
                ->help('Upload multiple images for the gallery');
        }

        // Fallback to text field for image URLs (comma-separated or JSON)
        return Textarea::make('Images', 'images')
            ->rows(3)
            ->nullable()
            ->help('Enter image URLs (one per line) or JSON array of image URLs');
    }
}
