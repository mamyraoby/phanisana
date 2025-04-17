<?php

namespace MamyRaoby\Phanisana\Enum;

enum Dictionary: string
{
    case GLUE_SY   = ' sy ';
    case GLUE_AMBY = ' amby ';

    case CUSTOM_ONE = 'iraika';

    case ZERO  = 'aotra';
    case ONE   = 'iray';
    case TWO   = 'roa';
    case THREE = 'telo';
    case FOUR  = 'efatra';
    case FIVE  = 'dimy';
    case SIX   = 'enina';
    case SEVEN = 'fito';
    case EIGHT = 'valo';
    case NINE  = 'sivy';

    case TEN     = 'folo';
    case TWENTY  = 'roapolo';
    case THIRTY  = 'telopolo';
    case FORTY   = 'efapolo';
    case FIFTY   = 'dimampolo';
    case SIXTY   = 'enimpolo';
    case SEVENTY = 'fitopolo';
    case EIGHTY  = 'valopolo';
    case NINETY  = 'sivifolo';

    case HUNDRED       = 'zato';
    case TWO_HUNDRED   = 'roanjato';
    case THREE_HUNDRED = 'telonjato';
    case FOUR_HUNDRED  = 'efajato';
    case FIVE_HUNDRED  = 'dimanjato';
    case SIX_HUNDRED   = 'enin-jato';
    case SEVEN_HUNDRED = 'fitonjato';
    case EIGHT_HUNDRED = 'valonjato';
    case NINE_HUNDRED  = 'sivinjato';

    case THOUSAND            = 'arivo';
    case TEN_THOUSAND        = 'alina';
    case HUNDRED_THOUSAND    = 'hetsy';
    case MILLION             = 'tapitrisa';
    case TEN_MILLION         = 'safatsiroa';
    case HUNDRED_MILLION     = 'tsitamboisa';
    case BILLION             = 'lavitrisa';
    case TEN_BILLION         = 'alinkisa';
    case HUNDRED_BILLION     = 'tsipesimpesina';
    case TRILLION            = 'tsitokotsiforohana';
    case TEN_TRILLION        = 'tsitanoanoa';
    case HUNDRED_TRILLION    = 'safatsiroafaharoa';
    case QUADRILLION         = 'tsitamboisafaharoa';
    case TEN_QUADRILLION     = 'lavitrisafaharoa';
    case HUNDRED_QUADRILLION = 'alinkisafaharoa';
    case QUINTILLION         = 'tsipesimpesinafaharoa';

    case YEAR = 'taona';
}
