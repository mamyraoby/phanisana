<?php

namespace MamyRaoby\Phanisana\Converter;

use MamyRaoby\Phanisana\Enum\Dictionary;

class NumberConverter
{
    public function toWords(int $number): string
    {
        if ($result = $this->convertWithThreshold($number, 1_000_000_000, fn ($n) => $this->convertBillions($n))) {
            return $result;
        }
        
        if ($result = $this->convertWithThreshold($number, 1_000_000, fn ($n) => $this->convertMillions($n))) {
            return $result;
        }

        if ($result = $this->convertWithThreshold($number, 100_000, fn ($n) => $this->convertHundredThousands($n))) {
            return $result;
        }

        if ($result = $this->convertWithThreshold($number, 10_000, fn ($n) => $this->convertTenThousands($n))) {
            return $result;
        }

        if ($number >= 1_000) {
            $remainder = $number % 1_000;

            if ($remainder === 0) {
                return $this->convertThousands($number);
            }

            return ($remainder === 1)
                ? Dictionary::ONE->value . Dictionary::GLUE_SY->value . $this->convertThousands($number - $remainder)
                : $this->toWords($remainder) . Dictionary::GLUE_SY->value . $this->convertThousands($number - $remainder);
        }

        if ($number >= 100) {
            $remainder = $number % 100;

            if ($remainder === 0) {
                return $this->convertHundreds($number);
            }

            if ($remainder === 1) {
                return Dictionary::CUSTOM_ONE->value . Dictionary::GLUE_AMBY->value . $this->convertHundreds($number - $remainder);
            }

            if ($number < 200 || $remainder < 10) {
                return $this->toWords($remainder) . Dictionary::GLUE_AMBY->value . $this->convertHundreds($number - $remainder);
            }

            return $this->toWords($remainder) . Dictionary::GLUE_SY->value . $this->convertHundreds($number - $remainder);
        }

        if ($number >= 10) {
            $remainder = $number % 10;

            if ($remainder === 0) {
                return $this->convertTens($number);
            }

            return ($remainder === 1)
                ? Dictionary::CUSTOM_ONE->value . Dictionary::GLUE_AMBY->value . $this->convertTens($number - $remainder)
                : $this->convertDigit($remainder) . Dictionary::GLUE_AMBY->value . $this->convertTens($number - $remainder);
        }

        if ($number >= 0) {
            return $this->convertDigit($number);
        }

        return '';
    }

    protected function convertWithThreshold(int $number, int $threshold, callable $converter): ?string
    {
        if ($number < $threshold) {
            return null;
        }

        $remainder = $number % $threshold;

        if ($remainder === 0) {
            return $converter($number);
        }

        return $this->toWords($remainder) . Dictionary::GLUE_SY->value . $converter($number - $remainder);
    }

    protected function convertDigit(int $number): string
    {
        return match ($number) {
            0       => Dictionary::ZERO->value,
            1       => Dictionary::ONE->value,
            2       => Dictionary::TWO->value,
            3       => Dictionary::THREE->value,
            4       => Dictionary::FOUR->value,
            5       => Dictionary::FIVE->value,
            6       => Dictionary::SIX->value,
            7       => Dictionary::SEVEN->value,
            8       => Dictionary::EIGHT->value,
            9       => Dictionary::NINE->value,
            default => '',
        };
    }

    protected function convertTens(int $number): string
    {
        return match ($number) {
            10      => Dictionary::TEN->value,
            20      => Dictionary::TWENTY->value,
            30      => Dictionary::THIRTY->value,
            40      => Dictionary::FORTY->value,
            50      => Dictionary::FIFTY->value,
            60      => Dictionary::SIXTY->value,
            70      => Dictionary::SEVENTY->value,
            80      => Dictionary::EIGHTY->value,
            90      => Dictionary::NINETY->value,
            default => '',
        };
    }

    protected function convertHundreds(int $number): string
    {
        return match ($number) {
            100     => Dictionary::HUNDRED->value,
            200     => Dictionary::TWO_HUNDRED->value,
            300     => Dictionary::THREE_HUNDRED->value,
            400     => Dictionary::FOUR_HUNDRED->value,
            500     => Dictionary::FIVE_HUNDRED->value,
            600     => Dictionary::SIX_HUNDRED->value,
            700     => Dictionary::SEVEN_HUNDRED->value,
            800     => Dictionary::EIGHT_HUNDRED->value,
            900     => Dictionary::NINE_HUNDRED->value,
            default => '',
        };
    }

    protected function convertThousands(int $number): string
    {
        if ($number > 1_000) {
            return $this->toWords($number / 1_000) . ' ' . Dictionary::THOUSAND->value;
        }

        return Dictionary::THOUSAND->value;
    }

    protected function convertTenThousands(int $number): string
    {
        return $this->toWords($number / 10_000) . ' ' . Dictionary::TEN_THOUSAND->value;
    }

    protected function convertHundredThousands(int $number): string
    {
        return $this->toWords($number / 100_000) . ' ' . Dictionary::HUNDRED_THOUSAND->value;
    }

    protected function convertMillions(int $number): string
    {
        return $this->toWords($number / 1_000_000) . ' ' . Dictionary::MILLION->value;
    }

    protected function convertBillions(int $number): string
    {
        return $this->toWords($number / 1_000_000_000) . ' ' . Dictionary::BILLION->value;
    }
}
