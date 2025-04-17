# Phanisana

**Phanisana** is a powerful PHP library that transforms numbers, dates, and times into their full-text equivalents in the Malagasy 🇲🇬 language. Whether you're localizing applications, building educational tools, or creating systems with Malagasy users in mind, Phanisana offers a reliable and intuitive solution.

The name **Phanisana** is a blend of **PHP** and the Malagasy word **fanisana**, meaning *"counting"* or *"calculation"*—perfectly reflecting the library’s purpose and roots.

---

## 📚 Documentation

Full documentation is available at 👉 [phanisana.readthedocs.io](https://phanisana.readthedocs.io/)

---

## 📦 Installation

Install the package via [Composer](https://getcomposer.org/):

```bash
composer require mamyraoby/phanisana
```

---

## 🚀 Quick Start

First, make sure Composer’s autoloader is included (optional if already loaded by your framework):

```php
// Include Composer's autoloader if it hasn't been loaded elsewhere
require 'vendor/autoload.php';

use MamyRaoby\Phanisana\Converter\NumberConverter;

$converter = new NumberConverter();

echo $converter->toWords(7);            // fito
echo $converter->toWords(69);           // sivy amby enimpolo
echo $converter->toWords(2025);         // dimy amby roapolo sy roa arivo
```

Or use the global helper function for shorter syntax:

```php
echo phanisana_convert_number(7);       // fito
echo phanisana_convert_number(2025);    // dimy amby roapolo sy roa arivo
```

More usage examples and details are available in the [Usage Guide](https://phanisana.readthedocs.io/en/latest/usage.html).

---

## ✅ Features

- Converts integers into accurate Malagasy number words.
- Supports numbers from `0` up to `PHP_INT_MAX` (usually 9,223,372,036,854,775,807 on 64-bit systems).
- Handles large numeric scales such as:
  - Millions (*tapitrisa*)
  - Billions (*lavitrisa*)
  - Trillions (*arivo lavitrisa*) and beyond
- Clean, extensible library
- Lightweight and framework-agnostic

---

## 🛠️ Contributing

Contributions are very welcome! Feel free to fork the repo, open issues, or submit pull requests. Bug reports, improvements, and suggestions are encouraged and appreciated.

---

## 📄 License

This project is open-source and licensed under the [GNU GPL 3.0 License](https://www.gnu.org/licenses/gpl-3.0.html).
