# Security Policy

## Reporting a vulnerability

Email [hello@josantonius.dev](mailto:hello@josantonius.dev) with `josantonius/php-session` in the subject.
Please coordinate disclosure before posting vulnerability details in a public issue or pull request.

Include the library and PHP versions, relevant session settings, the impact and steps to reproduce
with test data. Remove credentials, live session IDs, cookies and personal information from your report.

## Maintenance

This project is maintained voluntarily. Review, fixes and releases depend on the maintainer's
availability. Responses, fixes, backports and timelines are not guaranteed.

See [Requirements](README.md#requirements) for PHP compatibility. Use a PHP version that receives
[upstream security updates](https://www.php.net/supported-versions.php) and keep it patched.
Compatibility does not imply ongoing maintenance of a library release.

## Session configuration

The library uses PHP's session configuration and the options passed to `start()`. Applications
manage HTTPS, authentication, cookie settings, CSRF protection and session expiration.
Configuration-related security reports are welcome.

See [Security Best Practices](README.md#security-best-practices).
