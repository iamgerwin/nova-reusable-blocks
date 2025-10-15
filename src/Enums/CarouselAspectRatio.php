<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum CarouselAspectRatio: string
{
    case RATIO_16_9 = '16:9';
    case RATIO_21_9 = '21:9';
    case RATIO_3_1 = '3:1';

    public function label(): string
    {
        return match ($this) {
            self::RATIO_16_9 => '16:9 - Standard widescreen',
            self::RATIO_21_9 => '21:9 - Ultra-wide cinematic',
            self::RATIO_3_1 => '3:1 - Wide panoramic banner',
        };
    }

    public static function default(): self
    {
        return self::RATIO_16_9;
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
