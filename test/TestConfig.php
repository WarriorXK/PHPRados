<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 23:52
 */

require_once __DIR__ . '/../vendor/autoload.php';

use WarriorXK\PHPRados;

$cluster = new PHPRados\Cluster('/etc/ceph/ceph.conf');
//$cluster->createPool('TestPool');

$testPool = $cluster->getPoolIOContextByName('TestPool');
$testPool->createSnapshot('testsnap');
