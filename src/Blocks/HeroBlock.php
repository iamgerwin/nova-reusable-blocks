<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;

class HeroBlock
{
    /**
     * Create the hero section
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function section(): array
    {
        return [
            'Hero Block',
            'hero-block',
            [
                Select::make('Type', 'type')
                    ->options(static::getTypeOptions())
                    ->displayUsingLabels()
                    ->help('Choose the type of hero content'),

                static::imageField(),
                static::videoField(),
                static::carouselField(),
            ],
        ];
    }

    /**
     * Get hero type options
     *
     * @return array<string, string>
     */
    protected static function getTypeOptions(): array
    {
        return [
            'image' => 'Image',
            'video' => 'Video',
            'carousel' => 'Carousel',
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
                ->help('Upload an image (shown when type is "Image")');
        }

        return Image::make('Image', 'image')
            ->nullable()
            ->disk('public')
            ->help('Upload an image (shown when type is "Image")');
    }

    /**
     * Get the video field
     *
     * @return mixed
     */
    protected static function videoField()
    {
        if (class_exists(\Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::class)) {
            return \Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::make('Video', 'media_video_url')
                ->nullable()
                ->help('Upload a video (shown when type is "Video")');
        }

        return Textarea::make('Video URL', 'video_url')
            ->nullable()
            ->rows(2)
            ->help('Enter video URL (shown when type is "Video")');
    }

    /**
     * Get the carousel images field
     *
     * @return mixed
     */
    protected static function carouselField()
    {
        if (class_exists(\Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::class)) {
            return \Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField::make('Carousel Images', 'media_images_url')
                ->multiple()
                ->nullable()
                ->help('Upload multiple images (shown when type is "Carousel")');
        }

        return Textarea::make('Carousel Images', 'carousel_images')
            ->nullable()
            ->rows(3)
            ->help('Enter image URLs, one per line (shown when type is "Carousel")');
    }
}
