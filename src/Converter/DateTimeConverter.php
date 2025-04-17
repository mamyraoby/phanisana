<?php

namespace MamyRaoby\Phanisana\Converter;

use DateTimeInterface;
use MamyRaoby\Phanisana\Enum\Dictionary;
use MamyRaoby\Phanisana\Extensions\DateTime;

class DateTimeConverter
{
    public const FORMAT_DATE_LONG_TEXT   = 'DATE_LONG_TEXT';
    public const FORMAT_DATE_MEDIUM_TEXT = 'DATE_MEDIUM_TEXT';
    public const FORMAT_DATE_TEXT        = 'DATE_TEXT';

    public function convertDate(DateTimeInterface $date, string $format): string
    {
        $localeDate = DateTime::createFromInterface($date);

        if ($format === self::FORMAT_DATE_LONG_TEXT) {
            $weekday = $localeDate->format('l');
            $day     = phanisana_convert_number($localeDate->format('d'));
            $month   = $localeDate->format('F');
            $year    = phanisana_convert_number($localeDate->format('Y'));

            return strtolower(implode(' ', [$weekday, $day, $month, Dictionary::YEAR->value, $year]));
        }

        if ($format === self::FORMAT_DATE_MEDIUM_TEXT) {
            $day     = phanisana_convert_number($localeDate->format('d'));
            $month   = $localeDate->format('F');
            $year    = phanisana_convert_number($localeDate->format('Y'));

            return strtolower(implode(' ', [$day, $month, Dictionary::YEAR->value, $year]));
        }

        if ($format === self::FORMAT_DATE_TEXT) {
            $day     = phanisana_convert_number($localeDate->format('d'));
            $month   = $localeDate->format('F');
            $year    = phanisana_convert_number($localeDate->format('Y'));

            return strtolower(implode(' ', [$day, $month, $year]));
        }

        return $localeDate->format($format);
    }
}
