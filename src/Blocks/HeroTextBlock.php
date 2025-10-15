<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class HeroTextBlock
{
    /**
     * Create the hero text section
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function section(): array
    {
        return [
            'Hero Text Block',
            'hero-text-block',
            [
                Text::make('Title', 'title')
                    ->help('Main heading for the hero section'),

                Text::make('Subtitle', 'subtitle')
                    ->help('Secondary heading or tagline'),

                Textarea::make('Description', 'description')
                    ->rows(4)
                    ->help('Detailed description text'),
            ],
        ];
    }
}
