<?php

declare(strict_types=1);

namespace Iamgerwin\NovaReusableBlocks\Blocks;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class WYSIWYGBlock
{
    /**
     * Create the WYSIWYG content section
     *
     * @return array{0: string, 1: string, 2: array<mixed>}
     */
    public static function section(): array
    {
        return [
            'WYSIWYG Block',
            'wysiwyg-block',
            [
                Text::make('Title', 'title')
                    ->help('Optional title for the content section'),

                Textarea::make('Description', 'description')
                    ->rows(3)
                    ->help('Optional description or excerpt'),

                Boolean::make('Show Table of Contents', 'show_toc')
                    ->default(false)
                    ->resolveUsing(function ($value) {
                        return (bool) ($value ?? false);
                    })
                    ->help('Display a table of contents for the content'),

                static::contentField(),
            ],
        ];
    }

    /**
     * Get the content editor field
     *
     * Checks for available rich text editors and uses the best available option
     *
     * @return mixed
     */
    protected static function contentField()
    {
        // Check for TinymceEditor
        if (class_exists(\Murdercode\TinymceEditor\TinymceEditor::class)) {
            return \Murdercode\TinymceEditor\TinymceEditor::make('Content', 'content')
                ->fullWidth()
                ->readonly(false)
                ->help('Rich text content');
        }

        // Check for Trix (Nova's default rich text editor)
        if (class_exists(\Laravel\Nova\Fields\Trix::class)) {
            return \Laravel\Nova\Fields\Trix::make('Content', 'content')
                ->help('Rich text content');
        }

        // Fallback to Textarea
        return Textarea::make('Content', 'content')
            ->rows(15)
            ->help('Content in HTML or Markdown format');
    }
}
