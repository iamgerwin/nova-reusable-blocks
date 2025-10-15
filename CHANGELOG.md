# Changelog

All notable changes to `nova-reusable-blocks` will be documented in this file.

## 0.0.1 - 2025-10-15

### Added

- Initial release
- Carousel Banner Block with full feature set
- Base Section class for extensibility
- Support for PHP 8.2+ with strict types
- Comprehensive enum-based configuration
- MediaHub compatibility with Image field fallback
- Eight enums for type-safe configuration:
  - ButtonColorPalette (Light, Light Text, Dark)
  - ButtonSize (Small, Large)
  - ButtonTarget (Same Window, New Window)
  - ButtonVariant (Outline, Underline)
  - CarouselAspectRatio (16:9, 21:9, 3:1)
  - CarouselWidth (Full Width, Normal Width)
  - ContentPosition (9-point grid)
  - TransitionEffect (Slide, Fade, Cube, Coverflow, Flip, Cards)
- Carousel Banner features:
  - Multiple slides with images, titles, descriptions, and CTAs
  - Auto-play with configurable speed (1000-10000ms)
  - Transition effects with customizable speed (100-2000ms)
  - Navigation controls (arrows and dots)
  - Aspect ratio options
  - Width configuration
  - Button customization
  - Content positioning
  - Accessibility support
- Comprehensive Pest test suite
- PSR-12 compliant code
- PHPStan level 9 compliance
- Complete documentation
- Laravel Nova 4.0+ support
- Laravel 10.0, 11.0, and 12.0 support
