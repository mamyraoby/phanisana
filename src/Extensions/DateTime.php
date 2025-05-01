<?php

namespace MamyRaoby\Phanisana\Extensions;

use DateTime as GlobalDateTime;
use DateTimeInterface;

class DateTime extends GlobalDateTime implements DateTimeInterface
{
    protected $weekdaysMap = [
        'Monday'    => 'Alatsinainy',
        'Tuesday'   => 'Talata',
        'Wednesday' => 'Alarobia',
        'Thursday'  => 'Alakamisy',
        'Friday'    => 'Zoma',
        'Saturday'  => 'Asabotsy',
        'Sunday'    => 'Alahady',
    ];

    protected $shortWeekdaysMap = [
        'Mon' => 'Alats',
        'Tue' => 'Tal',
        'Wed' => 'Alar',
        'Thu' => 'Alak',
        'Fri' => 'Zom',
        'Sat' => 'Asab',
        'Sun' => 'Alah',
    ];

    protected $monthsMap = [
        'January'   => 'Janoary',
        'February'  => 'Febroary',
        'March'     => 'Martsa',
        'April'     => 'Aprily',
        'May'       => 'Mey',
        'June'      => 'Jona',
        'July'      => 'Jolay',
        'August'    => 'Aogositra',
        'September' => 'Septambra',
        'October'   => 'Oktobra',
        'November'  => 'Novambra',
        'December'  => 'Desambra',
    ];

    protected $shortMonthsMap = [
        'Jan' => 'Jan',
        'Feb' => 'Feb',
        'Mar' => 'Mar',
        'Apr' => 'Apr',
        'May' => 'Mey',
        'Jun' => 'Jon',
        'Jul' => 'Jol',
        'Aug' => 'Aog',
        'Sep' => 'Sep',
        'Oct' => 'Okt',
        'Nov' => 'Nov',
        'Dec' => 'Des',
    ];

    public function format(string $format): string
    {
        $result = parent::format($format);

        foreach ([
            $this->weekdaysMap,
            $this->monthsMap,
            $this->shortWeekdaysMap,
            $this->shortMonthsMap,
        ] as $map) {
            $result = str_replace(array_keys($map), $map, $result);
        }

        return $result;
    }
}
