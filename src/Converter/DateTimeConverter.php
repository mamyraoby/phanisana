<?php

namespace MamyRaoby\Phanisana\Converter;

use DateTimeInterface;
use MamyRaoby\Phanisana\Enum\Dictionary;
use MamyRaoby\Phanisana\Enum\DateDictionary;
use MamyRaoby\Phanisana\Exceptions\InvalidTimeFormatException;
use MamyRaoby\Phanisana\Extensions\DateTime;

class DateTimeConverter
{
    public const FORMAT_DATE_LONG_TEXT   = 'DATE_LONG_TEXT';
    public const FORMAT_DATE_MEDIUM_TEXT = 'DATE_MEDIUM_TEXT';
    public const FORMAT_DATE_TEXT        = 'DATE_TEXT';

    public const FORMAT_TIME_LONG_TEXT   = 'TIME_LONG_TEXT';

    public function convertDate(DateTimeInterface $date, string $format): string
    {
        $localeDate = DateTime::createFromInterface($date);

        if ($format === self::FORMAT_DATE_LONG_TEXT) {
            $weekday = $localeDate->format('l');
            $day     = phanisana_convert_number($localeDate->format('d'));
            $month   = $localeDate->format('F');
            $year    = phanisana_convert_number($localeDate->format('Y'));

            return strtolower(implode(' ', [$weekday, $day, $month, DateDictionary::YEAR->value, $year]));
        }

        if ($format === self::FORMAT_DATE_MEDIUM_TEXT) {
            $day     = phanisana_convert_number($localeDate->format('d'));
            $month   = $localeDate->format('F');
            $year    = phanisana_convert_number($localeDate->format('Y'));

            return strtolower(implode(' ', [$day, $month, DateDictionary::YEAR->value, $year]));
        }

        if ($format === self::FORMAT_DATE_TEXT) {
            $day     = phanisana_convert_number($localeDate->format('d'));
            $month   = $localeDate->format('F');
            $year    = phanisana_convert_number($localeDate->format('Y'));

            return strtolower(implode(' ', [$day, $month, $year]));
        }

        return $localeDate->format($format);
    }

    /**
     * @throws \MamyRaoby\Phanisana\Exceptions\InvalidTimeFormatException
     */
    public function convertTime(DateTimeInterface|string $time): string
    {
        if ($time instanceof DateTimeInterface) {
            $time = $time->format('H:i:s');
        }

        $pattern = '/^([01]\d|2[0-3]):([0-5]\d)(:[0-5]\d)?$/';

        $isValid = preg_match($pattern, $time) === 1;

        if ($isValid) {
            $splittedTime = explode(':', $time);
            $hour         = intval($splittedTime[0]);
            $minute       = intval($splittedTime[1]);
            $second       = intval($splittedTime[2] ?? 0);

            $hourSuffix = $this->getHourSuffix($hour);

            if ($hour > 12) {
                $hour = $hour - 12;
            }

            if ($hour === 0) {
                $hour = 12;
            }

            $words = [];

            $words[] = phanisana_convert_number($hour);
            $words[] = DateDictionary::HOUR->value;
            $words[] = $hourSuffix;

            if ($minute > 0) {
                $words[] = Dictionary::GLUE_SY->value;
                $words[] = phanisana_convert_number($minute);
                $words[] = DateDictionary::MINUTE->value;
            }

            if ($second > 0) {
                $words[] = Dictionary::GLUE_SY->value;
                $words[] = phanisana_convert_number($second);
                $words[] = DateDictionary::SECOND->value;
            }

            return trim(preg_replace('/\s+/', ' ', implode(' ', $words)));
        }

        throw new InvalidTimeFormatException();
    }

    protected function getHourSuffix(int $hour): string
    {
        $suffix = '';

        if (in_array($hour, range(1, 9))) {
            $suffix = DateDictionary::MORNING->value;
        }

        if (in_array($hour, range(10, 14))) {
            $suffix = DateDictionary::DAYLIGHT->value;
        }

        if (in_array($hour, range(15, 18))) {
            $suffix = DateDictionary::AFTERNOON->value;
        }

        if (in_array($hour, range(19, 23))) {
            $suffix = DateDictionary::NIGHT->value;
        }

        if ($hour === 0) {
            $suffix        = DateDictionary::NIGHT->value;
        }

        return $suffix;
    }
}
