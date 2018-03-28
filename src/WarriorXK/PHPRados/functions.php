<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 17:49
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

define('PHPRADOS_UNIT_B', 'b');
define('PHPRADOS_UNIT_KB', 'kb');
define('PHPRADOS_UNIT_MB', 'mb');
define('PHPRADOS_UNIT_GB', 'gb');
define('PHPRADOS_UNIT_TB', 'tb');
define('PHPRADOS_UNIT_PB', 'pb');
define('PHPRADOS_UNIT_EB', 'eb');
define('PHPRADOS_UNIT_ZB', 'zb');
define('PHPRADOS_UNIT_YB', 'yb');
define('PHPRADOS_UNITS', [
    PHPRADOS_UNIT_B => PHPRADOS_UNIT_B,
    PHPRADOS_UNIT_KB => PHPRADOS_UNIT_KB,
    PHPRADOS_UNIT_MB => PHPRADOS_UNIT_MB,
    PHPRADOS_UNIT_GB => PHPRADOS_UNIT_GB,
    PHPRADOS_UNIT_TB => PHPRADOS_UNIT_TB,
    PHPRADOS_UNIT_PB => PHPRADOS_UNIT_PB,
    PHPRADOS_UNIT_EB => PHPRADOS_UNIT_EB,
    PHPRADOS_UNIT_ZB => PHPRADOS_UNIT_ZB,
    PHPRADOS_UNIT_YB => PHPRADOS_UNIT_YB,
]);

define('PHPRADOS_RESOURCETYPE_CLUSTER', 'RADOS Cluster');
define('PHPRADOS_RESOURCETYPE_IOCTX', 'RADOS IOCtx');

/**
 * @param string $sourceUnit
 * @param string $targetUnit
 * @param float  $value
 * @param int    $precision
 *
 * @return float
 */
function convertFormat(string $sourceUnit, string $targetUnit, float $value, int $precision = 0) : float {

    if ($sourceUnit === $targetUnit) {
        return $value;
    }

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

    return round($value, $precision);
}
