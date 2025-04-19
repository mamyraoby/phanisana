

 # Date and Time Conversion
 
 **Phanisana** provides robust support for converting PHP `DateTime` objects or strings into their full **Malagasy word representations**, suitable for natural language outputs, localization, or educational tools.
 
 ---
 
 ## 📅 Date Conversion
 
 The `DateTimeConverter` class provides multiple formatting levels for converting dates into readable Malagasy text.
 
 ### ✅ Available Date Formats
 
 | Constant                         | Description                            | Example Output                                                           |
 |----------------------------------|----------------------------------------|---------------------------------------------------------------------------|
 | `FORMAT_DATE_LONG_TEXT`         | Full text with day of the week         | `alakamisy fito amby folo aprily taona dimy amby roapolo sy roa arivo`  |
 | `FORMAT_DATE_MEDIUM_TEXT`       | Date with month and year               | `fito amby folo aprily taona dimy amby roapolo sy roa arivo`            |
 | `FORMAT_DATE_TEXT`              | Shorter form without “taona”           | `fito amby folo aprily dimy amby roapolo sy roa arivo`                  |
 
 You can also use custom PHP-style date format strings:
 
 ```php
 echo $converter->convertDate($date, 'd F Y');
 // Output: 17 Aprily 2025
 
 echo $converter->convertDate($date, 'l d F Y');
 // Output: Alakamisy 17 Aprily 2025
 
 echo $converter->convertDate($date, 'D d F Y');
 // Output: Alak 17 Aprily 2025
 ```
 
 ---
 
 ## 🕰️ Time Conversion
 
 Time strings can be converted to natural Malagasy expressions. Input should be in `HH:mm` or `HH:mm:ss` format (24-hour clock).
 
 ### ✅ Examples
 
 ```php
 echo $converter->convertTime('08:10', DateTimeConverter::FORMAT_TIME_LONG_TEXT);
 // Output: valo ora maraina sy folo minitra
 
 echo $converter->convertTime('00:00', DateTimeConverter::FORMAT_TIME_LONG_TEXT);
 // Output: roa amby folo ora alina
 
 echo $converter->convertTime('12:00', DateTimeConverter::FORMAT_TIME_LONG_TEXT);
 // Output: roa amby folo ora atoandro
 
 echo $converter->convertTime('13:39', DateTimeConverter::FORMAT_TIME_LONG_TEXT);
 // Output: iray ora atoandro sy sivy amby telopolo minitra
 
 echo $converter->convertTime('18:14:56', DateTimeConverter::FORMAT_TIME_LONG_TEXT);
 // Output: enina ora hariva sy efatra amby folo minitra sy enina amby dimampolo segondra
 ```
 
 > ⚠️ **Note:** Invalid time format (e.g. `08:90`) will throw an `InvalidTimeFormatException`.
 
 ---
 
 ## 🌅 Malagasy Day Parts
 
 Depending on the time of day, Malagasy uses different words to indicate the period:
 
 | Malagasy       | English         |
 |----------------|------------------|
 | **maraina**    | morning          |
 | **atoandro**   | noon / midday    |
 | **tolakandro** | afternoon        |
 | **hariva**     | evening          |
 | **alina**      | night            |
 
 ---
 
 ## 📆 Full DateTime Conversion
 
 Combine both `convertDate` and `convertTime` to represent a full Malagasy datetime expression.
 
 ```php
 $date = new DateTime('2025-04-17 18:14:56');
 
 echo $converter->convertDate($date, DateTimeConverter::FORMAT_DATE_LONG_TEXT);
 // Output: alakamisy fito amby folo aprily taona dimy amby roapolo sy roa arivo
 
 echo $converter->convertTime($date->format('H:i:s'), DateTimeConverter::FORMAT_TIME_LONG_TEXT);
 // Output: enina ora hariva sy efatra amby folo minitra sy enina amby dimampolo segondra
``` 

---

## 🎁 Bonus Feature: Extended DateTime Class

Phanisana also includes a convenient `DateTime` class that extends PHP’s native `DateTime` class. This extended class provides all standard datetime manipulation capabilities while integrating full support for **Malagasy localization**.

You can use it anywhere in your application to seamlessly manipulate and output Malagasy-friendly date and time strings.

```php
use Phanisana\DateTime;

$datetime = new DateTime('2025-04-17 18:14:56');

echo $datetime->format('l d F Y');
// Output: Alakamisy 17 Aprily 2025
```

> 📝 **Note:** All regular PHP `DateTime` format strings are fully supported.

### 📖 Common PHP DateTime Format Characters

| Format | Description             | Example Output        |
|--------|-------------------------|-----------------------|
| `Y`    | Full numeric year       | `2025`                |
| `y`    | Two-digit year          | `25`                  |
| `m`    | Numeric month (01–12)   | `04`                  |
| `F`    | Full month name         | `Aprily`              |
| `d`    | Day of the month        | `17`                  |
| `l`    | Full weekday name       | `Alakamisy`           |
| `D`    | Short weekday name      | `Alak`                |
| `H`    | Hour (00–23)            | `18`                  |
| `i`    | Minutes (00–59)         | `14`                  |
| `s`    | Seconds (00–59)         | `56`                  |

These can be combined to format output however you need:
```php
echo $datetime->format('l d F Y H:i:s');
// Output: Alakamisy 17 Aprily 2025 18:14:56
```

