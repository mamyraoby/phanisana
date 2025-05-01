<?php

namespace MamyRaoby\Phanisana\Exceptions;

use Exception;

class InvalidTimeFormatException extends Exception
{
    public $message = 'Invalid time format. It should be HH:MM or HH:MM:SS';
}
