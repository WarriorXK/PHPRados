<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 28/03/2018
 * Time: 09:25
 */

namespace WarriorXK\PHPRados;

class PoolStat implements \JsonSerializable {

    /**
     * @var int
     */
    protected $_num_objects_missing_on_primary = NULL;

    /**
     * @var int
     */
    protected $_num_objects_degraded = NULL;

    /**
     * @var int
     */
    protected $_num_objects_unfound = NULL;

    /**
     * @var int
     */
    protected $_num_object_copies = NULL;

    /**
     * @var int
     */
    protected $_num_object_clones = NULL;

    /**
     * @var int
     */
    protected $_num_objects = NULL;

    /**
     * @var int
     */
    protected $_num_bytes = NULL;

    /**
     * @var int
     */
    protected $_num_rd_kb = NULL;

    /**
     * @var int
     */
    protected $_num_wr_kb = NULL;

    /**
     * @var int
     */
    protected $_num_kb = NULL;

    /**
     * @var int
     */
    protected $_num_rd = NULL;

    /**
     * @var int
     */
    protected $_num_wr = NULL;

    /**
     * PoolStat constructor.
     *
     * @param resource $poolResource
     *
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function __construct($poolResource) {

        $poolResourceType = get_resource_type($poolResource);
        if (!is_resource($poolResource) || $poolResourceType !== PHPRADOS_RESOURCETYPE_IOCTX) {
            throw new \InvalidArgumentException('First argument has to be a resource of type ' . PHPRADOS_RESOURCETYPE_IOCTX . ', got ' . $poolResourceType);
        }

        $ret = \rados_ioctx_pool_stat($poolResource);

        $exception = Exception::FromReturnValue($ret, FALSE);
        if ($exception !== NULL) {
            throw $exception;
        }

        $this->_num_objects_missing_on_primary = $ret['num_objects_missing_on_primary'];
        $this->_num_objects_degraded = $ret['num_objects_degraded'];
        $this->_num_objects_unfound = $ret['num_objects_unfound'];
        $this->_num_object_copies = $ret['num_object_copies'];
        $this->_num_object_clones = $ret['num_object_clones'];
        $this->_num_objects = $ret['num_objects'];
        $this->_num_bytes = $ret['num_bytes'];
        $this->_num_rd_kb = $ret['num_rd_kb'];
        $this->_num_wr_kb = $ret['num_wr_kb'];
        $this->_num_kb = $ret['num_kb'];
        $this->_num_rd = $ret['num_rd'];
        $this->_num_wr = $ret['num_wr'];

    }

    /**
     * @return int
     */
    public function getNumObjectsMissingOnPrimary() : int {
        return $this->_num_objects_missing_on_primary;
    }

    /**
     * @return int
     */
    public function getDegradedObjectsCount() : int {
        return $this->_num_objects_degraded;
    }

    /**
     * @return int
     */
    public function getUnfoundObjectsCount() : int {
        return $this->_num_objects_unfound;
    }

    /**
     * @return int
     */
    public function getObjectCopiesCount() : int {
        return $this->_num_object_copies;
    }

    /**
     * @return int
     */
    public function getObjectClonesCount() : int {
        return $this->_num_object_clones;
    }

    /**
     * @return int
     */
    public function getObjectCount() : int {
        return $this->_num_objects;
    }

    /**
     * @param string $unit
     *
     * @return int
     */
    public function getUsedSpace(string $unit = PHPRADOS_UNIT_KB) : int {
        return convertFormat($this->_num_bytes, PHPRADOS_UNIT_B, $unit);
    }

    /**
     * @return array
     */
    public function jsonSerialize() {
        return [
            'num_objects_missing_on_primary' => $this->_num_objects_missing_on_primary,
            'num_objects_degraded' => $this->_num_objects_degraded,
            'num_objects_unfound' => $this->_num_objects_unfound,
            'num_object_copies' => $this->_num_object_copies,
            'num_object_clones' => $this->_num_object_clones,
            'num_objects' => $this->_num_objects,
            'num_bytes' => $this->_num_bytes,
            'num_rd_kb' => $this->_num_rd_kb,
            'num_wr_kb' => $this->_num_wr_kb,
            'num_kb' => $this->_num_kb,
            'num_rd' => $this->_num_rd,
            'num_wr' => $this->_num_wr,
        ];
    }

}