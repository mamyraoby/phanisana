<?php

namespace MamyRaoby\Phanisana\Test\Converter;

use MamyRaoby\Phanisana\Converter\DateTimeConverter;
use MamyRaoby\Phanisana\Extensions\DateTime;
use DateTime as GlobalDateTime;
use PHPUnit\Framework\TestCase;

class DateTimeConverterTest extends TestCase
{
    public function testPhanisanaDateTimeExtension()
    {
        $date = new DateTime('2025-04-17'); // Phanisana DateTime extension object
        $this->assertEquals('17 Aprily 2025', $date->format('d F Y'));
        $this->assertEquals('Alakamisy 17 Aprily 2025', $date->format('l d F Y'));
        $this->assertEquals('Alakamisy 17 Apr 2025', $date->format('l d M Y'));
        $this->assertEquals('Alak 17 Apr 2025', $date->format('D d M Y'));
    }

    public function testFullDateFullTextFormat()
    {
        $date      = new GlobalDateTime('2025-04-17'); // PHP native DateTime object
        $converter = new DateTimeConverter();

        $this->assertEqualsIgnoringCase('alakamisy fito amby folo aprily taona dimy amby roapolo sy roa arivo', $converter->convertDate($date, DateTimeConverter::FORMAT_DATE_LONG_TEXT));
        $this->assertEqualsIgnoringCase('fito amby folo aprily taona dimy amby roapolo sy roa arivo', $converter->convertDate($date, DateTimeConverter::FORMAT_DATE_MEDIUM_TEXT));
        $this->assertEqualsIgnoringCase('fito amby folo aprily dimy amby roapolo sy roa arivo', $converter->convertDate($date, DateTimeConverter::FORMAT_DATE_TEXT));
        $this->assertEquals('17 Aprily 2025', $converter->convertDate($date, 'd F Y'));
        $this->assertEquals('Alakamisy 17 Aprily 2025', $converter->convertDate($date, 'l d F Y'));
        $this->assertEquals('Alak 17 Aprily 2025', $converter->convertDate($date, 'D d F Y'));
    }
}
