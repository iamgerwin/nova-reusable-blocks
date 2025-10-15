<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Enums;

enum ContentPosition: string
{
    case CENTER = 'center';
    case TOP_LEFT = 'top-left';
    case TOP_CENTER = 'top-center';
    case TOP_RIGHT = 'top-right';
    case CENTER_LEFT = 'center-left';
    case CENTER_RIGHT = 'center-right';
    case BOTTOM_LEFT = 'bottom-left';
    case BOTTOM_CENTER = 'bottom-center';
    case BOTTOM_RIGHT = 'bottom-right';

    public function label(): string
    {
        return match ($this) {
            self::CENTER => 'Center',
            self::TOP_LEFT => 'Top Left',
            self::TOP_CENTER => 'Top Center',
            self::TOP_RIGHT => 'Top Right',
            self::CENTER_LEFT => 'Center Left',
            self::CENTER_RIGHT => 'Center Right',
            self::BOTTOM_LEFT => 'Bottom Left',
            self::BOTTOM_CENTER => 'Bottom Center',
            self::BOTTOM_RIGHT => 'Bottom Right',
        };
    }

    public static function default(): self
    {
        return self::CENTER;
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
