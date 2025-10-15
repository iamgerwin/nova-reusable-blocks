<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum ButtonVariant: string
{
    case Outline = 'outline';
    case Underline = 'underline';

    public static function default(): self
    {
        return self::Outline;
    }

    public function label(): string
    {
        return match ($this) {
            self::Outline => 'Outline',
            self::Underline => 'Underline',
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
