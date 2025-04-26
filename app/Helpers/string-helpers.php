<?php

if (!function_exists('cleanup_uppercase')) {
    function cleanup_uppercase($string)
    {


        return strtoupper(trim(preg_replace('/\s+/', ' ', $string)));
    }
}

if (!function_exists('format_name')) {
    function format_name($firstname, $lastname)
    {


        $fullname = $firstname . ' ' . $lastname;

        $clean = strtolower($fullname);
        return ucwords($clean);
    }
}
