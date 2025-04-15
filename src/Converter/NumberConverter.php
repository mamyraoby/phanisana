<?php

namespace MamyRaoby\Phanisana\Converter;

use MamyRaoby\Phanisana\Enum\Dictionary;

class NumberConverter
{
    public function toWords(int $number): string
    {
        if ($number >= 1000000000) {
            $millions = $number % 1000000000;
            if ($millions === 0) {
                return $this->convertBillions($number);
            }

            return $this->toWords($millions) . Dictionary::GLUE_SY->value . $this->convertBillions($number - $millions);
        }

        if ($number >= 1000000) {
            $hundredThousands = $number % 1000000;
            if ($hundredThousands === 0) {
                return $this->convertMillions($number);
            }

            return $this->toWords($hundredThousands) . Dictionary::GLUE_SY->value . $this->convertMillions($number - $hundredThousands);
        }

        if ($number >= 100000) {
            $tenThousands = $number % 100000;
            if ($tenThousands === 0) {
                return $this->convertHundredThousands($number);
            }

            return $this->toWords($tenThousands) . Dictionary::GLUE_SY->value . $this->convertHundredThousands($number - $tenThousands);
        }

        if ($number >= 10000) {
            $thousands = $number % 10000;
            if ($thousands === 0) {
                return $this->convertTenThousands($number);
            }

            return $this->toWords($thousands) . Dictionary::GLUE_SY->value . $this->convertTenThousands($number - $thousands);
        }

        if ($number >= 1000) {
            $hundreds = $number % 1000;

            if ($hundreds === 0) {
                return $this->convertThousands($number);
            }

            return ($hundreds === 1)
                ? Dictionary::ONE->value . Dictionary::GLUE_SY->value . $this->convertThousands($number - $hundreds)
                : $this->toWords($hundreds) . Dictionary::GLUE_SY->value . $this->convertThousands($number - $hundreds);
        }

        if ($number >= 100) {
            $tens = $number % 100;

            if ($tens === 0) {
                return $this->convertHundreds($number);
            }

            if ($tens === 1) {
                return Dictionary::CUSTOM_ONE->value . Dictionary::GLUE_AMBY->value . $this->convertHundreds($number - $tens);
            }

            if ($number < 200 || $tens < 10) {
                return $this->toWords($tens) . Dictionary::GLUE_AMBY->value . $this->convertHundreds($number - $tens);
            }

            return $this->toWords($tens) . Dictionary::GLUE_SY->value . $this->convertHundreds($number - $tens);
        }

        if ($number >= 10) {
            $digit = $number % 10;

            if ($digit === 0) {
                return $this->convertTens($number);
            }

            return ($digit === 1)
                ? Dictionary::CUSTOM_ONE->value . Dictionary::GLUE_AMBY->value . $this->convertTens($number - $digit)
                : $this->convertDigit($digit) . Dictionary::GLUE_AMBY->value . $this->convertTens($number - $digit);
        }

        if ($number >= 0) {
            return $this->convertDigit($number);
        }

        return '';
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
        if ($number > 1000) {
            return $this->toWords($number / 1000) . ' ' . Dictionary::THOUSAND->value;
        }

        return Dictionary::THOUSAND->value;
    }

    protected function convertTenThousands(int $number): string
    {
        return $this->toWords($number / 10000) . ' ' . Dictionary::TEN_THOUSAND->value;
    }

    protected function convertHundredThousands(int $number): string
    {
        return $this->toWords($number / 100000) . ' ' . Dictionary::HUNDRED_THOUSAND->value;
    }

    protected function convertMillions(int $number): string
    {
        return $this->toWords($number / 1000000) . ' ' . Dictionary::MILLION->value;
    }
    
    protected function convertBillions(int $number): string
    {
        return $this->toWords($number / 1000000000) . ' ' . Dictionary::BILLION->value;
    }
}
