<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 18:18
 */

namespace WarriorXK\PHPRados;

class PoolConfig implements \ArrayAccess {

    protected $_clusterResource = NULL;
    protected $_cluster = NULL;

    /**
     * PoolConfig constructor.
     *
     * @param \WarriorXK\PHPRados\Cluster $cluster
     * @param resource                    $clusterResource
     */
    public function __construct(Cluster $cluster, $clusterResource) {

        $this->_clusterResource = $clusterResource;
        $this->_cluster = $cluster;

    }

    /**
     * @param string $key
     *
     * @return array|bool|string
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function getKey(string $key) {

        $ret = \rados_conf_get($this->_clusterResource, $key);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return array|bool
     * @throws \WarriorXK\PHPRados\Exception
     */
    public function setKey(string $key, string $value) {

        $ret = \rados_conf_set($this->_clusterResource, $key, $value);

        $exception = Exception::FromReturnValue($ret);
        if ($exception !== NULL) {
            throw $exception;
        }

        return $ret;
    }

    /**
     * @param string $offset
     *
     * @return bool
     *
     * @internal
     */
    public function offsetExists($offset) : bool {

        if (!is_string($offset)) {
            throw new \InvalidArgumentException('Only string keys are supported');
        }

        /** @var string $offset */

        $ret = \rados_conf_get($this->_clusterResource, $offset);
        if (is_array($ret) && ($ret['errCode'] ?? NULL) === 2) {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * @param string $offset
     *
     * @return string
     * @throws \WarriorXK\PHPRados\Exception
     *
     * @internal
     */
    public function offsetGet($offset) : string {

        if (!is_string($offset)) {
            throw new \InvalidArgumentException('Only string keys are supported');
        }

        return $this->getKey($offset);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return bool
     * @throws \WarriorXK\PHPRados\Exception
     *
     * @internal
     */
    public function offsetSet($offset, $value)  : bool {

        if (!is_string($offset)) {
            throw new \InvalidArgumentException('Only string keys are supported');
        }
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Only string values are supported');
        }

        /** @var string $offset */
        /** @var string $value */

        return $this->setKey($offset, $value);
    }

    /**
     * @param mixed $offset
     * @throws \LogicException
     *
     * @internal
     */
    public function offsetUnset($offset) {
        throw new \LogicException('Unsetting config keys is not supported');
    }

}