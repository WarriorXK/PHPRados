<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 18:06
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

class Pool {

    /**
     * @var resource
     */
    protected $_clusterResource = NULL;

    /**
     * @var resource
     */
    protected $_poolResource = NULL;

    /**
     * @param resource $clusterResource
     * @param resource $poolResource
     */
    public function __construct($clusterResource, $poolResource) {

        $clusterResourceType = get_resource_type($clusterResource);
        if (!is_resource($clusterResource) || $clusterResourceType !== PHPRADOS_RESOURCETYPE_CLUSTER) {
            throw new \InvalidArgumentException('First argument has to be a resource of type ' . PHPRADOS_RESOURCETYPE_CLUSTER . ', got ' . $clusterResourceType);
        }

        $poolResourceType = get_resource_type($poolResource);
        if (!is_resource($poolResource) || $poolResourceType !== PHPRADOS_RESOURCETYPE_IOCTX) {
            throw new \InvalidArgumentException('First argument has to be a resource of type ' . PHPRADOS_RESOURCETYPE_IOCTX . ', got ' . $poolResourceType);
        }

        $this->_clusterResource = $clusterResource;
        $this->_poolResource = $poolResource;

    }

    /**
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function destroy() : bool {

        $ret = \rados_ioctx_destroy($this->_poolResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param int $auid
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function setAUID(int $auid) : bool {

        $ret = \rados_ioctx_pool_set_auid($this->_poolResource, $auid);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @return int
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getAUID() : int {

        $ret = \rados_ioctx_pool_get_auid($this->_poolResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param string $data
     * @param int    $offset
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function writeObject(string $objectID, string $data, int $offset = -1) : bool {

        if ($offset >= 0) {
            $ret = \rados_write($this->_poolResource, $objectID, $data, $offset);
        } else {
            $ret = \rados_write_full($this->_poolResource, $objectID, $data);
        }

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param int    $size
     * @param int    $offset
     *
     * @return string
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function readObject(string $objectID, int $size = 0, $offset = 0) : string {

        if ($size <= 0) {
            $size = (int) $this->statObject($objectID)->getSize(PHPRADOS_UNIT_B);
        }

        $ret = \rados_read($this->_poolResource, $objectID, $size, $offset);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function removeObject(string $objectID) : bool {

        $ret = \rados_remove($this->_poolResource, $objectID);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param int    $size
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function truncateObject(string $objectID, int $size = 0) : bool {

        $ret = \rados_trunc($this->_poolResource, $objectID, $size);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param string $data
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function appendObject(string $objectID, string $data) : bool {

        $ret = \rados_append($this->_poolResource, $objectID, $data);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $srcObjectID
     * @param int    $srcStart
     * @param string $dstObjectID
     * @param int    $dstStart
     * @param int    $size
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function cloneRange(string $srcObjectID, int $srcStart, string $dstObjectID, int $dstStart, int $size) : bool {

        $ret = \rados_clone_range($this->_poolResource, $dstObjectID, $dstStart, $srcObjectID, $srcStart, $size);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param string $name
     * @param int    $size
     *
     * @return string
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getXAttribute(string $objectID, string $name, int $size) : string {

        $ret = \rados_getxattr($this->_poolResource, $objectID, $name, $size);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param string $name
     * @param string $value
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function setXAttribute(string $objectID, string $name, string $value) : bool {

        $ret = \rados_setxattr($this->_poolResource, $objectID, $name, $value);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $objectID
     * @param string $name
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function removeXAttribute(string $objectID, string $name) : bool {

        $ret = \rados_rmxattr($this->_poolResource, $objectID, $name);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * Returns the latest version of this pool, returns NULL if this is the latest version
     *
     * @return null|static
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getLatestVersion() {

        $latestID = \rados_get_last_version($this->_poolResource);
        $myID = $this->getID();

        if ($latestID === $myID) {
            return NULL;
        }

        $ret = \rados_ioctx_create2($this->_clusterResource, $latestID);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return new static($this->_clusterResource, $ret);
    }

    /**
     * @param string $objectID
     *
     * @return \WarriorXK\PHPRados\ObjectStat
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function statObject(string $objectID) : ObjectStat {
        return new ObjectStat($this->_poolResource, $objectID);
    }

    /**
     * @return \WarriorXK\PHPRados\PoolStat
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function stat() : PoolStat {
        return new PoolStat($this->_poolResource);
    }

    /**
     * @return int
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getID() : int {

        $ret = \rados_ioctx_get_id($this->_poolResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $name
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function createSnapshot(string $name) : bool {

        $ret = \rados_ioctx_snap_create($this->_poolResource, $name);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $name
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function removeSnapshot(string $name) : bool {

        $ret = \rados_ioctx_snap_remove($this->_poolResource, $name);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

}
