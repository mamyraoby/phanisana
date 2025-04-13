# Phanisana

**Phanisana** is a PHP library for converting numbers into words in Malagasy, the national language of Madagascar 🇲🇬. This can be useful for applications like check writing, financial reports, or educational tools.

---

## 📦 Installation

Use [Composer](https://getcomposer.org/) to install:

```bash
composer require mamyraoby/phanisana
```

---

## 🚀 Usage

Make sure you include Composer’s autoloader:

```php
require 'vendor/autoload.php';

use MamyRaoby\Phanisana\Converter\NumberConverter;

$converter = new NumberConverter();

echo $converter->toWords(7);       // fito
echo $converter->toWords(69);      // sivy amby enimpolo
echo $converter->toWords(2025);    // dimy amby roapolo sy roa arivo
echo $converter->toWords(3429267); // fito amby enimpolo sy roanjato sy sivy arivo sy roa alina sy efatra hetsy sy telo tapitrisa
```

This demonstrates how to convert various number ranges into Malagasy words using the `NumberConverter`.
