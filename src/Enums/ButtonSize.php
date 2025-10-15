<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum ButtonSize: string
{
    case Small = 'sm';
    case Large = 'lg';

    public static function default(): self
    {
        return self::Large;
    }

    public function label(): string
    {
        return match ($this) {
            self::Small => 'Small',
            self::Large => 'Large',
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
