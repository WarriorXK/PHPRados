<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 18:18
 */

namespace WarriorXK\PHPRados;

class PoolConfig {

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

}