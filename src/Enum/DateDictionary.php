<?php

namespace MamyRaoby\Phanisana\Enum;

enum DateDictionary: string {
    case YEAR   = 'taona';
    case HOUR   = 'ora';
    case MINUTE = 'minitra';
    case SECOND = 'segondra';

    case MORNING   = 'maraina';
    case DAYLIGHT  = 'atoandro';
    case AFTERNOON = 'hariva';
    case NIGHT     = 'alina';
}