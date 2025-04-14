<?php

use MamyRaoby\Phanisana\Converter\NumberConverter;

if (!function_exists('phanisana_convert_number')) {
    function phanisana_convert_number(int $number): string {
        $converter = new NumberConverter();
        return $converter->toWords($number);
    }
}