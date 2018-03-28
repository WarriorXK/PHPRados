<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 27/03/2018
 * Time: 18:29
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

class ObjectStat {

    /**
     * @var int
     */
    protected $_pmtime = NULL;

    /**
     * @var int
     */
    protected $_psize = NULL;

    /**
     * @var string
     */
    protected $_oid = NULL;

    /**
     * ObjectStat constructor.
     *
     * @param resource $poolResource
     * @param string   $objectID
     *
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function __construct($poolResource, string $objectID) {

        $poolResourceType = get_resource_type($poolResource);
        if (!is_resource($poolResource) || $poolResourceType !== PHPRADOS_RESOURCETYPE_IOCTX) {
            throw new \InvalidArgumentException('First argument has to be a resource of type ' . PHPRADOS_RESOURCETYPE_IOCTX . ', got ' . $poolResourceType);
        }

        $ret = \rados_stat($poolResource, $objectID);

        $exception = Exception::FromReturnValue($ret, FALSE);
        if ($exception !== NULL) {
            throw $exception;
        }

        $this->_pmtime = $ret['pmtime'];
        $this->_psize = $ret['psize'];
        $this->_oid = $ret['oid'];

    }

    /**
     * @return int
     */
    public function getMTime() : int {
        return $this->_pmtime;
    }

    /**
     * @param string $unit
     *
     * @return float
     */
    public function getSize(string $unit = PHPRADOS_UNIT_B) : float {
        return convertFormat(PHPRADOS_UNIT_B, $unit, $this->_psize);
    }

    /**
     * @return string
     */
    public function getObjectID() : string {
        return $this->_oid;
    }

}