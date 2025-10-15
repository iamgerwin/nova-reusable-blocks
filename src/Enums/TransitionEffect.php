<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum TransitionEffect: string
{
    case SLIDE = 'slide';
    case FADE = 'fade';
    case CUBE = 'cube';
    case COVERFLOW = 'coverflow';
    case FLIP = 'flip';
    case CARDS = 'cards';

    public function label(): string
    {
        return match ($this) {
            self::SLIDE => 'Slide',
            self::FADE => 'Fade',
            self::CUBE => 'Cube',
            self::COVERFLOW => 'Coverflow',
            self::FLIP => 'Flip',
            self::CARDS => 'Cards',
        };
    }

    public static function default(): self
    {
        return self::SLIDE;
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        /** @var array<string, string> */
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn ($case) => $case->label(), self::cases())
        );
    }
}
