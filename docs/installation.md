# Installation

Get started with **Phanisana** quickly by following these simple steps. This guide will walk you through the requirements and installation process to integrate the library into your PHP project.

## Requirements

Before installing **Phanisana**, ensure your development environment meets the following requirements:

- PHP version **7.4** or higher
- Composer version **2** or higher

You can check your current versions by running:
```bash
php -v
composer -V
```

## Installation

### Step 1: Install the package via Composer

Use Composer to include **Phanisana** in your project. Run the following command in the root of your project directory:

```bash
composer require mamyraoby/phanisana
```

Composer will automatically download and register the package and its dependencies.

### Step 2: Load the package (if needed)

If you’re setting up a new project or working without a framework, make sure to include Composer’s autoloader. Add the following line to the top of your project’s entry point (e.g., `index.php`):

```php
<?php
require 'vendor/autoload.php';
```

You’re now ready to start using **Phanisana**! 🎉

For usage examples and advanced configuration, check out the [Usage Guide](./usages/number).