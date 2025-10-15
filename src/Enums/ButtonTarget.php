<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum ButtonTarget: string
{
    case SELF = '_self';
    case BLANK = '_blank';

    public function label(): string
    {
        return match ($this) {
            self::SELF => 'Same Window',
            self::BLANK => 'New Window',
        };
    }

    public static function default(): self
    {
        return self::SELF;
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
