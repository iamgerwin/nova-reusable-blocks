# Contributing to Nova Reusable Blocks

Thank you for considering contributing to Nova Reusable Blocks! This document outlines the guidelines for contributing to this project.

## Commit Message Convention

This project follows the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/) specification. This leads to more readable messages that are easy to follow when looking through the project history and enables automatic changelog generation.

### Commit Message Format

Each commit message consists of a **header**, a **body**, and a **footer**. The header has a special format that includes a **type**, an optional **scope**, and a **description**:

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

#### Type

Must be one of the following:

- **feat**: A new feature
- **fix**: A bug fix
- **docs**: Documentation only changes
- **style**: Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
- **refactor**: A code change that neither fixes a bug nor adds a feature
- **perf**: A code change that improves performance
- **test**: Adding missing tests or correcting existing tests
- **build**: Changes that affect the build system or external dependencies
- **ci**: Changes to our CI configuration files and scripts
- **chore**: Other changes that don't modify src or test files
- **revert**: Reverts a previous commit

#### Scope

The scope should be the name of the package/component affected (e.g., `enums`, `blocks`, `section`, `tests`, `deps`).

#### Description

- Use the imperative, present tense: "change" not "changed" nor "changes"
- Don't capitalize the first letter
- No dot (.) at the end

#### Body

Just as in the description, use the imperative, present tense. The body should include the motivation for the change and contrast this with previous behavior.

#### Footer

The footer should contain any information about **Breaking Changes** and is also the place to reference GitHub issues that this commit closes.

**Breaking Changes** should start with the word `BREAKING CHANGE:` with a space or two newlines. The rest of the commit message is then used for this.

### Examples

#### Commit message with description and breaking change footer
```
feat: allow provided config object to extend other configs

BREAKING CHANGE: `extends` key in config file is now used for extending other config files
```

#### Commit message with ! to draw attention to breaking change
```
feat!: send an email to the customer when a product is shipped
```

#### Commit message with scope
```
feat(lang): add Polish language
```

#### Commit message with multi-paragraph body and multiple footers
```
fix: prevent racing of requests

Introduce a request id and a reference to latest request. Dismiss
incoming responses other than from latest request.

Remove timeouts which were used to mitigate the racing issue but are
obsolete now.

Reviewed-by: Z
Refs: #123
```

#### Common commit types by example

```bash
# Adding a new feature
feat(blocks): add hero banner block

# Fixing a bug
fix(enums): correct default value for ButtonSize

# Updating documentation
docs: update installation instructions in README

# Refactoring code
refactor(section): simplify block registration logic

# Performance improvements
perf(section): optimize block loading

# Adding or updating tests
test(enums): add tests for TransitionEffect enum

# Updating dependencies
build(deps): update spatie/laravel-package-tools to v1.17

# CI/CD changes
ci: add PHP 8.3 to test matrix

# Code style changes
style: apply PSR-12 formatting

# Other maintenance tasks
chore: update .gitignore
```

## Development Workflow

1. Fork the repository
2. Create a feature branch from `main`
3. Make your changes following the coding standards
4. Write or update tests as needed
5. Ensure all tests pass: `composer test`
6. Ensure code passes static analysis: `composer analyse`
7. Format your code: `composer format`
8. Commit your changes using Conventional Commits format
9. Push to your fork and submit a pull request

## Coding Standards

- Follow PSR-12 coding standards
- Maintain PHPStan level 9 compliance
- Write tests for new features
- Update documentation as needed
- Use PHP 8.2+ features and strict types

## Pull Request Guidelines

- Use Conventional Commits format for PR titles
- Provide a clear description of the changes
- Link any related issues
- Ensure CI passes before requesting review
- Keep PRs focused and reasonably sized

## Questions?

Feel free to open an issue for any questions or concerns.
