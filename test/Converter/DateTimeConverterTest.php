<?php

namespace MamyRaoby\Phanisana\Test\Converter;

use MamyRaoby\Phanisana\Converter\DateTimeConverter;
use MamyRaoby\Phanisana\Extensions\DateTime;
use DateTime as GlobalDateTime;
use MamyRaoby\Phanisana\Exceptions\InvalidTimeFormatException;
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

    public function testConvertTime()
    {
        $converter = new DateTimeConverter();

        $this->assertEquals('valo ora maraina sy folo minitra', $converter->convertTime('08:10', DateTimeConverter::FORMAT_TIME_LONG_TEXT));

        $this->assertEquals('roa amby folo ora alina', $converter->convertTime('00:00', DateTimeConverter::FORMAT_TIME_LONG_TEXT));
        $this->assertEquals('roa amby folo ora atoandro', $converter->convertTime('12:00', DateTimeConverter::FORMAT_TIME_LONG_TEXT));

        $this->assertEquals('telo ora maraina sy dimy amby folo minitra sy telopolo segondra', $converter->convertTime('03:15:30', DateTimeConverter::FORMAT_TIME_LONG_TEXT));
        $this->assertEquals('iray ora atoandro sy sivy amby telopolo minitra', $converter->convertTime('13:39', DateTimeConverter::FORMAT_TIME_LONG_TEXT));

        $this->assertEquals('enina ora hariva sy efatra amby folo minitra sy enina amby dimampolo segondra', $converter->convertTime('18:14:56', DateTimeConverter::FORMAT_TIME_LONG_TEXT));

        $this->expectException(InvalidTimeFormatException::class);
        $this->assertEquals('valo ora sy sivy folo minitra', $converter->convertTime('08:90', DateTimeConverter::FORMAT_TIME_LONG_TEXT));
    }
}
