<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 17:49
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

/**
 * @param string $sourceUnit
 * @param string $targetUnit
 * @param float  $value
 * @param int    $precision
 *
 * @return float
 */
function convertFormat(string $sourceUnit, string $targetUnit, float $value, int $precision = 0) : float {

    if ($sourceUnit !== $targetUnit) {

        $diff = PHPRADOS_UNITS[$sourceUnit] - PHPRADOS_UNITS[$targetUnit];

        $divide = ($diff < 0);
        if ($divide) {
            $diff = -$diff;
        }

        for ($i = 0; $i < $diff; $i++) {

            if ($divide) {
                $value /= 1000;
            } else {
                $value *= 1000;
            }
        }

    }

    return round($value, $precision);
}
