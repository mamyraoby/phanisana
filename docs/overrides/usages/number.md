# Number Converter

**Phanisana** supports numbers from 0 up to `PHP_INT_MAX` (typically 9,223,372,036,854,775,807 on 64-bit systems), converting them into their full Malagasy word representations.

## Basic Usage

To convert a number into its Malagasy word form, you can use the `NumberConverter` class or the global helper function `phanisana_number_converter()`.

### Using the NumberConverter class

First, ensure you have included the Composer autoloader:

```php
<?php

// Include Composer's autoloader if it hasn't been loaded elsewhere
require 'vendor/autoload.php';

use MamyRaoby\Phanisana\Converter\NumberConverter;

// Instantiate the converter
$converter = new NumberConverter();

// Convert a number to Malagasy words
echo $converter->toWords(2025); 
// Output: dimy amby roapolo sy roa arivo
```

### Using the helper function

If you prefer a simpler syntax, use the global helper function:

```php
<?php

// Include Composer's autoloader if it hasn't been loaded elsewhere
require 'vendor/autoload.php';

echo phanisana_number_converter(119); 
// Output: sivy amby folo amby zato
```

## Notes

- The converter handles compound numbers using correct Malagasy grammatical structures.
- Negative numbers and decimal support are currently **not** available.
- If you pass a non-integer value, a `TypeError` will be thrown.
