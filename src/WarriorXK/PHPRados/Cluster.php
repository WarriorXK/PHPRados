<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 25/03/2018
 * Time: 21:27
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

class Cluster {

    /**
     * @var \WarriorXK\PHPRados\PoolConfig
     */
    protected $_poolConfig = NULL;

    /**
     * @var resource
     */
    protected $_clusterResource = NULL;

    /**
     * @param string|NULL $configFile
     * @param string|NULL $user
     * @param string|NULL $cluster
     * @param bool        $connect
     *
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function __construct(string $configFile = NULL, string $user = NULL, string $cluster = NULL, bool $connect = TRUE) {

        if ($user !== NULL || $cluster) {
            $this->_clusterResource = \rados_create2((string) $cluster, (string) $user);
        } else {
            $this->_clusterResource = \rados_create();
        }

        $exception = Exception::FromReturnValue($this->_clusterResource);
        if ($exception !== NULL) {
            throw $exception;
        }

        if ($configFile !== NULL) {
            $this->loadConfigFile($configFile);
        }

        if ($connect) {
            $this->connect();
        }

    }

    /**
     * @param string $filename
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function loadConfigFile(string $filename) : bool {

        if (!is_file($filename)) {
            throw new \LogicException('File "' . $filename . '" not found');
        }

        $ret = \rados_conf_read_file($this->_clusterResource, $filename);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @return array|bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function connect() {

        $ret = \rados_connect($this->_clusterResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function disconnect() {

        $ret = \rados_shutdown($this->_clusterResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @return string[]
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getPoolList() : array {

        $ret = \rados_pool_list($this->_clusterResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $poolName
     *
     * @return bool|int
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getPoolIDForName(string $poolName) {

        $ret = \rados_pool_lookup($this->_clusterResource, $poolName);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param int $poolID
     *
     * @return bool|string
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getPoolNameForID(int $poolID) {

        $ret = \rados_pool_reverse_lookup($this->_clusterResource, $poolID);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $name
     * @param array  $options
     *
     * @return array|bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function createPool(string $name, array $options = []) {

        $ret = \rados_pool_create($this->_clusterResource, $name, $options);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $name
     *
     * @return array|bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function deletePool(string $name) {

        $ret = \rados_pool_delete($this->_clusterResource, $name);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @return \WarriorXK\PHPRados\PoolStat
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function stat() : PoolStat {
        return new PoolStat($this->_clusterResource);
    }

    /**
     * @return string
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getFSID() : string {

        $ret = \rados_cluster_fsid($this->_clusterResource);

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
    public function getInstanceID() : int {

        $ret = \rados_get_instance_id($this->_clusterResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function waitForLatestOSDMap() : bool {

        $ret = \rados_wait_for_latest_osdmap($this->_clusterResource);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $name
     *
     * @return \WarriorXK\PHPRados\PoolIOContext
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getPoolIOContextByName(string $name) : PoolIOContext {

        $ret = \rados_ioctx_create($this->_clusterResource, $name);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return new PoolIOContext($ret);
    }

    /**
     * @param int $id
     *
     * @return \WarriorXK\PHPRados\PoolIOContext
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getPoolIOContextByID(int $id) : PoolIOContext {

        $ret = \rados_ioctx_create2($this->_clusterResource, $id);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return new PoolIOContext($ret);
    }

    /**
     * @return \WarriorXK\PHPRados\PoolConfig
     */
    public function getConfig() : PoolConfig {

        if ($this->_poolConfig === NULL) {
            $this->_poolConfig = new PoolConfig($this, $this->_clusterResource);
        }

        return $this->_poolConfig;
    }

}
