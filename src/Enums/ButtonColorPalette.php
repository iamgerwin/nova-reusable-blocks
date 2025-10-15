<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum ButtonColorPalette: string
{
    case Light = 'light';
    case LightText = 'light-text';
    case Dark = 'dark';

    public static function default(): self
    {
        return self::Light;
    }

    public function label(): string
    {
        return match ($this) {
            self::Light => 'Light',
            self::LightText => 'Light Text',
            self::Dark => 'Dark',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        /** @var array<string, string> */
        return collect(self::cases())->mapWithKeys(
            fn ($case) => [$case->value => $case->label()]
        )->toArray();
    }
}
