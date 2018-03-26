<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 19:27
 */

namespace WarriorXK\PHPRados;

class PoolStat {

    const SPACEUNIT_KB = 'kb',
          SPACEUNIT_MB = 'mb',
          SPACEUNIT_GB = 'gb',
          SPACEUNIT_TB = 'tb';

    /**
     * @var int
     */
    protected $_objectsNum = NULL;

    /**
     * @var int
     */
    protected $_kbAvailable = NULL;

    /**
     * @var int
     */
    protected $_kbUsed = NULL;

    /**
     * @var int
     */
    protected $_kb = NULL;

    protected static function _ConvertFormat(string $sourceUnit, string $targetUnit, int $value) : int {

        if ($sourceUnit === $targetUnit) {
            return $value;
        }

        // Convert value to KB
        switch ($sourceUnit) {
            case static::SPACEUNIT_KB:
                break;
            case static::SPACEUNIT_MB:
                $value = $value * 1000;
                break;
            case static::SPACEUNIT_GB:
                $value = ($value * 1000) * 1000;
                break;
            case static::SPACEUNIT_TB:
                $value = (($value * 1000) * 1000) * 1000;
                break;
            default:
                throw new \InvalidArgumentException('Unknown source unit "' . $sourceUnit . '"');
        }

        // Convert value in KB to target
        switch ($targetUnit) {
            case static::SPACEUNIT_KB:
                return (int) $value;
            case static::SPACEUNIT_MB:
                return (int) ($value / 1000);
            case static::SPACEUNIT_GB:
                return (int) (($value / 1000) / 1000);
            case static::SPACEUNIT_TB:
                return (int) ((($value / 1000) / 1000) / 1000);
            default:
                throw new \InvalidArgumentException('Unknown source unit "' . $sourceUnit . '"');
        }

    }

    public function __construct($resource) {

        $ret = \rados_cluster_stat($resource);

        $exception = Exception::FromReturnValue($ret, FALSE);
        if ($exception !== NULL) {
            throw $exception;
        }

        $this->_objectsNum = $ret['num_objects'];
        $this->_kbAvailable = $ret['kb_avail'];
        $this->_kbUsed = $ret['kb_used'];
        $this->_kb = $ret['kb'];

    }

    public function getObjectCount() : int {
        return $this->_objectsNum;
    }

    public function getAvailableSpace(string $unit) : int {
        return static::_ConvertFormat(static::SPACEUNIT_KB, $unit, $this->_kbAvailable);
    }

    public function getUsedSpace(string $unit) : int {
        return static::_ConvertFormat(static::SPACEUNIT_KB, $unit, $this->_kbUsed);
    }

    public function getSpace(string $unit) : int {
        return static::_ConvertFormat(static::SPACEUNIT_KB, $unit, $this->_kb);
    }

}