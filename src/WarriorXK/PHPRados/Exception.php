<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 17:50
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

class Exception extends \Exception {

    /**
     * @param bool|array $value
     * @param bool       $errorOnFalse
     *
     * @return null|static
     */
    public static function FromReturnValue($value, bool $errorOnFalse = TRUE) {

        if ($value === FALSE) {
            return new static('An unknown error has occured', -1);
        } elseif (is_array($value) && isset($value['errCode']) && $errorOnFalse) {
            return new static($value['errMessage'], $value['errCode']);
        }

        return NULL;
    }

}
