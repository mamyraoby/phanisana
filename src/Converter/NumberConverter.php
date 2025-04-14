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
        return match ($number) {
            1000    => Dictionary::THOUSAND->value,
            2000    => Dictionary::TWO_THOUSAND->value,
            3000    => Dictionary::THREE_THOUSAND->value,
            4000    => Dictionary::FOUR_THOUSAND->value,
            5000    => Dictionary::FIVE_THOUSAND->value,
            6000    => Dictionary::SIX_THOUSAND->value,
            7000    => Dictionary::SEVEN_THOUSAND->value,
            8000    => Dictionary::EIGHT_THOUSAND->value,
            9000    => Dictionary::NINE_THOUSAND->value,
            default => '',
        };
    }

    protected function convertTenThousands(int $number): string
    {
        return match ($number) {
            10000   => Dictionary::TEN_THOUSAND->value,
            20000   => Dictionary::TWENTY_THOUSAND->value,
            30000   => Dictionary::THIRTY_THOUSAND->value,
            40000   => Dictionary::FORTY_THOUSAND->value,
            50000   => Dictionary::FIFTY_THOUSAND->value,
            60000   => Dictionary::SIXTY_THOUSAND->value,
            70000   => Dictionary::SEVENTY_THOUSAND->value,
            80000   => Dictionary::EIGHTY_THOUSAND->value,
            90000   => Dictionary::NINETY_THOUSAND->value,
            default => '',
        };
    }

    protected function convertHundredThousands(int $number): string
    {
        return match ($number) {
            100000   => Dictionary::ONE_HUNDRED_THOUSAND->value,
            200000   => Dictionary::TWO_HUNDRED_THOUSAND->value,
            300000   => Dictionary::THREE_HUNDRED_THOUSAND->value,
            400000   => Dictionary::FOUR_HUNDRED_THOUSAND->value,
            500000   => Dictionary::FIVE_HUNDRED_THOUSAND->value,
            600000   => Dictionary::SIX_HUNDRED_THOUSAND->value,
            700000   => Dictionary::SEVEN_HUNDRED_THOUSAND->value,
            800000   => Dictionary::EIGHT_HUNDRED_THOUSAND->value,
            900000   => Dictionary::NINE_HUNDRED_THOUSAND->value,
            default  => '',
        };
    }

    protected function convertMillions(int $number): string
    {
        $beforeMillions = $number / 1000000;

        if($beforeMillions >= 1 && $beforeMillions <= 9){
            return match ($number) {
                1000000   => Dictionary::MILLION->value,
                2000000   => Dictionary::TWO_MILLION->value,
                3000000   => Dictionary::THREE_MILLION->value,
                4000000   => Dictionary::FOUR_MILLION->value,
                5000000   => Dictionary::FIVE_MILLION->value,
                6000000   => Dictionary::SIX_MILLION->value,
                7000000   => Dictionary::SEVEN_MILLION->value,
                8000000   => Dictionary::EIGHT_MILLION->value,
                9000000   => Dictionary::NINE_MILLION->value,
                default   => '',
            };
        }

        if($beforeMillions >= 10 && $beforeMillions <= 99)
        {
            return $this->toWords($beforeMillions).' tapitrisa';
        }

        if($beforeMillions >= 100 && $beforeMillions <= 999)
        {
            return $this->toWords($beforeMillions).' tapitrisa';
        }

        return '';
    }

    protected function convertBillions(int $number): string
    {
        return match ($number) {
            1000000000   => Dictionary::BILLION->value,
            2000000000   => Dictionary::TWO_BILLION->value,
            3000000000   => Dictionary::THREE_BILLION->value,
            4000000000   => Dictionary::FOUR_BILLION->value,
            5000000000   => Dictionary::FIVE_BILLION->value,
            6000000000   => Dictionary::SIX_BILLION->value,
            7000000000   => Dictionary::SEVEN_BILLION->value,
            8000000000   => Dictionary::EIGHT_BILLION->value,
            9000000000   => Dictionary::NINE_BILLION->value,
            default   => '',
        };
    }
}
