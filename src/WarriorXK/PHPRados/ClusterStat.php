<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 19:27
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

class ClusterStat {

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

    /**
     * ClusterStat constructor.
     *
     * @param resource $clusterResource
     *
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function __construct($clusterResource) {

        $clusterResourceType = get_resource_type($clusterResource);
        if (!is_resource($clusterResource) || $clusterResourceType !== PHPRADOS_RESOURCETYPE_CLUSTER) {
            throw new \InvalidArgumentException('First argument has to be a resource of type ' . PHPRADOS_RESOURCETYPE_CLUSTER . ', got ' . $clusterResourceType);
        }

        $ret = \rados_cluster_stat($clusterResource);

        $exception = Exception::FromReturnValue($ret, FALSE);
        if ($exception !== NULL) {
            throw $exception;
        }

        $this->_objectsNum = $ret['num_objects'];
        $this->_kbAvailable = $ret['kb_avail'];
        $this->_kbUsed = $ret['kb_used'];
        $this->_kb = $ret['kb'];

    }

    /**
     * @return int
     */
    public function getObjectCount() : int {
        return $this->_objectsNum;
    }

    /**
     * @param string $unit
     *
     * @return float
     */
    public function getAvailableSpace(string $unit = PHPRADOS_UNIT_KB) : float {
        return convertFormat(PHPRADOS_UNIT_KB, $unit, $this->_kbAvailable);
    }

    /**
     * @param string $unit
     *
     * @return float
     */
    public function getUsedSpace(string $unit = PHPRADOS_UNIT_KB) : float {
        return convertFormat(PHPRADOS_UNIT_KB, $unit, $this->_kbUsed);
    }

    /**
     * @param string $unit
     *
     * @return float
     */
    public function getSpace(string $unit = PHPRADOS_UNIT_KB) : float {
        return convertFormat(PHPRADOS_UNIT_KB, $unit, $this->_kb);
    }

}
