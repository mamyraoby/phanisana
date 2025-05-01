<?php

namespace MamyRaoby\Phanisana\Enum;

enum DateDictionary: string
{
    case YEAR   = 'taona';
    case HOUR   = 'ora';
    case MINUTE = 'minitra';
    case SECOND = 'segondra';

    case MORNING   = 'maraina';
    case MIDDAY    = 'atoandro';
    case AFTERNOON = 'tolakandro';
    case EVENING   = 'hariva';
    case NIGHT     = 'alina';

    case GLUE_AT = 'tamin\'ny';
}
