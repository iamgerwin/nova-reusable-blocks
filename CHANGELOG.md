# Changelog

All notable changes to `nova-reusable-blocks` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html)
and [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/).

## [0.0.3] - 2025-10-15

### Fixed

- fix(blocks): remove required validation from carousel slides field ([#2](https://github.com/iamgerwin/nova-reusable-blocks/issues/2))
  - Carousel Banner block is now truly optional within a Section
  - Users can submit forms without adding carousel content
  - Individual slide images remain required when slides are created

## [0.0.2] - 2025-10-15

### Added

- docs: add CONTRIBUTING.md with Conventional Commits guidelines
- docs: add commit message format and examples
- docs: add development workflow documentation
- docs: add coding standards and PR guidelines

### Changed

- docs: update README with Contributing section
- docs: update CHANGELOG format to follow Keep a Changelog

### Fixed

- fix(deps): add Laravel 12 support to resolve GitHub Actions failures
- fix(deps): update Pest dependencies to support both v3 and v4
- fix(deps): correct orchestra/testbench version order
- fix(tests): correct ServiceProvider class reference in TestCase
- fix(tests): skip tests requiring Nova Flexible Content in test environment

## [0.0.1] - 2025-10-15

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
