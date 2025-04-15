<?php

namespace MamyRaoby\Phanisana\Test\Converter;

use MamyRaoby\Phanisana\Converter\NumberConverter;
use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
    public function testZero()
    {
        $converter = new NumberConverter();
        $this->assertEquals('aotra', $converter->toWords(0));
    }

    public function testDigits()
    {
        $converter = new NumberConverter();
        $this->assertEquals('iray', $converter->toWords(1));
        $this->assertEquals('fito', $converter->toWords(7));
        $this->assertEquals('sivy', $converter->toWords(9));
    }

    public function testTens()
    {
        $converter = new NumberConverter();
        $this->assertEquals('folo', $converter->toWords(10));
        $this->assertEquals('fitopolo', $converter->toWords(70));
        $this->assertEquals('iraika amby telopolo', $converter->toWords(31));
        $this->assertEquals('sivy amby enimpolo', $converter->toWords(69));
    }

    public function testHundreds()
    {
        $converter = new NumberConverter();
        $this->assertEquals('zato', $converter->toWords(100));
        $this->assertEquals('efajato', $converter->toWords(400));
        $this->assertEquals('efatra amby efajato', $converter->toWords(404));
        $this->assertEquals('iraika amby folo amby zato', $converter->toWords(111));
        $this->assertEquals('sivy amby roapolo sy efajato', $converter->toWords(429));
        $this->assertEquals('sivy amby sivifolo sy sivinjato', $converter->toWords(999));
    }

    public function testThousands()
    {
        $converter = new NumberConverter();
        $this->assertEquals('arivo', $converter->toWords(1000));
        $this->assertEquals('dimy arivo', $converter->toWords(5000));
        $this->assertEquals('iray sy roa arivo', $converter->toWords(2001));
        $this->assertEquals('roa sy roa arivo', $converter->toWords(2002));
        $this->assertEquals('roa amby folo sy roa arivo', $converter->toWords(2012));
        $this->assertEquals('dimy amby roapolo sy roa arivo', $converter->toWords(2025));
        $this->assertEquals('sivinjato sy arivo', $converter->toWords(1900));
        $this->assertEquals('sivy amby sivifolo sy sivinjato sy arivo', $converter->toWords(1999));
    }

    public function testTenThousands()
    {
        $converter = new NumberConverter();
        $this->assertEquals('iray alina', $converter->toWords(10000));
        $this->assertEquals('dimy arivo sy iray alina', $converter->toWords(15000));
        $this->assertEquals('fito amby enimpolo sy roanjato sy sivy arivo sy telo alina', $converter->toWords(39267));
    }

    public function testHundredThousands()
    {
        $converter = new NumberConverter();
        $this->assertEquals('iray hetsy', $converter->toWords(100000));
        $this->assertEquals('dimanjato sy dimy arivo sy dimy alina sy iray hetsy', $converter->toWords(155500));
        $this->assertEquals('fito amby enimpolo sy roanjato sy sivy arivo sy roa alina sy telo hetsy', $converter->toWords(329267));
    }

    public function testMillions()
    {
        $converter = new NumberConverter();
        $this->assertEquals('iray tapitrisa', $converter->toWords(1000000));
        $this->assertEquals('dimanjato sy dimy arivo sy valo alina sy efatra hetsy sy sivy tapitrisa', $converter->toWords(9485500));
        $this->assertEquals('fito amby enimpolo sy roanjato sy sivy arivo sy roa alina sy efatra hetsy sy telo tapitrisa', $converter->toWords(3429267));
    }

    public function testBillions()
    {
        $converter = new NumberConverter();
        $this->assertEquals('iray lavitrisa', $converter->toWords(1000000000));
        $this->assertEquals('dimy arivo sy efatra alina sy telo safatsiroa sy sivy lavitrisa', $converter->toWords(9030045000));
        $this->assertEquals('fito arivo sy enina alina sy roa hetsy sy sivy tapitrisa sy roa safatsiroa sy efatra tsitamboisa sy telo lavitrisa', $converter->toWords(3429267000));
    }
    
    public function testMaxSupportedNumber()
    {
        $converter = new NumberConverter();
        $this->assertEquals('fito amby valonjato sy dimy arivo sy fito alina sy fito hetsy sy efatra tapitrisa sy dimy safatsiroa sy valo tsitamboisa sy enina lavitrisa sy telo alinkisa sy roa tsitokotsiforohana sy fito tsitanoanoa sy telo safatsiroafaharoa sy telo tsitamboisafaharoa sy roa lavitrisafaharoa sy roa alinkisafaharoa sy sivy tsipesimpesinafaharoa', $converter->toWords(9223372036854775807));
    }

    public function testHelper()
    {
        $this->assertEquals('iraika amby folo', phanisana_convert_number(11));
    }
}
