# HousingPanda Assessment Documentation

## Overview

This project leverages **CodeIgniter 4**, a lightweight, fast, flexible, and secure PHP web framework. It is designed as a composer-installable application starter, enabling developers to build scalable web applications efficiently.

---

## Features

### CodeIgniter 4 Framework
- Full-stack PHP framework for modern web applications.
- Extends functionality with a rich ecosystem of libraries and tools.
- Official documentation: [CodeIgniter User Guide](https://codeigniter.com/user_guide/).

### Key Functionalities
- **PHP 8.1+ Compatibility**: Built to support the latest PHP versions.
- **Enhanced Security**: `index.php` is relocated to the `public` folder, ensuring better separation of components.
- **Unit Testing**: Integrated PHPUnit support for robust testing practices.

---

## Installation

1. Install the application starter using Composer:
   ```bash
   composer create-project codeigniter4/appstarter
   ```
   Update dependencies periodically with:
   ```bash
   composer update
   ```

2. Configure the environment:
   - Copy the `env` file to `.env`.
   - Customize the base URL and database configuration in the `.env` file.

---

## Server Requirements

- **PHP version**: 8.1 or higher.
- Required extensions:
  - `intl`
  - `mbstring`
  - `json` (default-enabled)
  - `mysqlnd` (required for MySQL)
  - `libcurl` (required for HTTP requests)

Ensure these extensions are enabled in the PHP configuration.

---

## Running Tests

### Prerequisites
- Install PHPUnit with Composer:
  ```bash
  composer install
  ```
- Configure XDebug for code coverage:
  Add `xdebug.mode=coverage` in your `php.ini`.

### Test Execution
Run tests from the main directory:
```bash
./phpunit
```
For Windows:
```bash
vendor\bin\phpunit
```

### Code Coverage
Generate coverage reports:
```bash
./phpunit --colors --coverage-text=tests/coverage.txt --coverage-html=tests/coverage/
```
View the HTML report at `tests/coverage/index.html`.

---
