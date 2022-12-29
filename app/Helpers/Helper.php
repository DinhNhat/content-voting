<?php


namespace App\Helpers;


class Helper
{
    // Check if the main string contains the search string then return the first index position in the main string
    public static function contains_substr($mainStr, $str, $loc = false) {
        if ($loc === false) return (stripos($mainStr, $str) !== false);
        if (strlen($mainStr) < strlen($str)) return false;
        if (($loc + strlen($str)) > strlen($mainStr)) return false;
        return (strcasecmp(substr($mainStr, $loc, strlen($str)), $str) == 0);
    }

    public static function getSubString($mainStr, $subStr) {
        if (self::contains_substr($mainStr, $subStr)) {
            $startPosition = stripos($mainStr, $subStr);
            return substr($mainStr, $startPosition, strlen($subStr));
        } else {
            return false;
        }
    }
}
