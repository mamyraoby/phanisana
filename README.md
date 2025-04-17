# Phanisana

**Phanisana** is a PHP library that converts numbers into written words in Malagasy, the national language of Madagascar 🇲🇬. It’s especially useful for applications like check writing, financial reports, or educational software.

---

## 📦 Installation

Install the package via [Composer](https://getcomposer.org/):

```bash
composer require mamyraoby/phanisana
```

---

## 🚀 Usage

### Number Converter
First, make sure Composer’s autoloader is included:

```php
require 'vendor/autoload.php';

use MamyRaoby\Phanisana\Converter\NumberConverter;

$converter = new NumberConverter();

echo $converter->toWords(7); // fito
echo $converter->toWords(2025); // dimy amby roapolo sy roa arivo

// Or use the global helper function:
echo phanisana_convert_number(7); // fito
echo phanisana_convert_number(2025); // dimy amby roapolo sy roa arivo
```

### Date Converter

---

## ✅ Features

- Converts integers into Malagasy number words.
- Supports numbers from 0 up to `PHP_INT_MAX` (typically 9,223,372,036,854,775,807 on 64-bit systems).
- Handles large numbers including:
  - Millions (tapitrisa)
  - Billions (lavitrisa)
  - Trillions (arivo lavitrisa) and beyond
---

## 🛠️ Contributing

Pull requests are welcome! If you find bugs or have suggestions for improvements, feel free to open an issue.

---

## 📄 License

This project is open-sourced under the GNU GPL 3.0 License.
