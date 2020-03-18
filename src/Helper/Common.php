<?php


namespace App\Helper;


/**
 * Class Common
 *
 * @package App\Helper
 */
class Common
{

    /**
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * @param array $input
     * @return array
     */
    public static function htmlEntityDecode(array $input)
    {
        foreach ($input as $k => $v) {
            if (!is_array($v)) {
                $input[$k] = html_entity_decode($v);
            } else {
                $input[$k] = self::htmlEntityDecode($v);
            }
        }

        return $input;
    }
}