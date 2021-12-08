<?php

namespace Librairies;

class Utils
{
    public static function sanitize($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlentities($string);
        return $string;
    }
}
