<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum CarouselWidth: string
{
    case FULL_WIDTH = 'full_width';
    case NORMAL_WIDTH = 'normal_width';

    public function label(): string
    {
        return match ($this) {
            self::FULL_WIDTH => 'Full Width (100% viewport width)',
            self::NORMAL_WIDTH => 'Normal Width (constrained container)',
        };
    }

    public static function default(): self
    {
        return self::NORMAL_WIDTH;
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
