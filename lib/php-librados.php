<?php

/**
 * Returns an array on failure, with keys errCode and errMessage
 *
 * @param string $id The user to authenticate as without the 'client.' prefix
 *
 * @return resource|array
 */
function rados_create($id = '') {

}

/**
 * Returns an array on failure, with keys errCode and errMessage
 *
 * @param string $clustername The cluster to connect to
 * @param string $name        The user to authenticate as
 * @param int    $flags
 *
 * @return resource|array
 */
function rados_create2($clustername = '', $name = '', $flags = 0) {

}

/**
 * @param resource $cluster
 *
 * @return bool
 */
function rados_shutdown($cluster) {

}

/**
 * Returns an array on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 *
 * @return bool|array
 */
function rados_connect($cluster) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param string   $path
 *
 * @return bool|array
 */
function rados_conf_read_file($cluster, $path) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param string   $option
 * @param string   $value
 *
 * @return bool|array
 */
function rados_conf_set($cluster, $option, $value) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param string   $option
 *
 * @return string|bool|array
 */
function rados_conf_get($cluster, $option) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $cluster
 * @param string   $pool
 *
 * @return resource|bool
 */
function rados_ioctx_create($cluster, string $pool) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $cluster
 * @param int      $pool_id
 *
 * @return resource|bool
 */
function rados_ioctx_create2($cluster, $pool_id) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $cluster
 *
 * @return bool|null
 */
function rados_ioctx_destroy($ioctx) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 *
 * @return string[]|bool
 */
function rados_pool_list($cluster) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param string   $pool
 *
 * @return int|bool|array
 */
function rados_pool_lookup($cluster, $pool) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param string   $pool
 * @param array    $options Assoc array with options
 *
 * @return bool|array
 */
function rados_pool_create($cluster, $pool, $options = []) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param string   $pool
 *
 * @return bool|array
 */
function rados_pool_delete($cluster, $pool) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param int      $auid
 *
 * @return bool|array
 */
function rados_ioctx_pool_set_auid($ioctx, $auid) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 *
 * @return int|bool|array
 */
function rados_ioctx_pool_get_auid($ioctx) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid    Object name
 * @param string   $buffer
 * @param int      $offset
 *
 * @return bool|array
 */
function rados_write($ioctx, $oid, $buffer, $offset = 0) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid    Object name
 * @param string   $buffer
 *
 * @return bool|array
 */
function rados_write_full($ioctx, $oid, $buffer) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid    Object name
 * @param int      $size
 * @param int      $offset
 *
 * @return string|bool|array
 */
function rados_read($ioctx, $oid, $size, $offset = 0) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid    Object name
 *
 * @return bool|array
 */
function rados_remove($ioctx, $oid) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid    Object name
 * @param int      $size
 *
 * @return bool|array
 */
function rados_trunc($ioctx, $oid, $size = 0) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid    Object name
 * @param string   $buffer
 *
 * @return bool|array
 */
function rados_append($ioctx, $oid, $buffer) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $dst_oidoid    Destination object name
 * @param int      $dst_offset
 * @param string   $src_offsetobj Source object name
 * @param int      $src_offset
 * @param int      $size
 *
 * @return bool|array
 */
function rados_clone_range($ioctx, $dst_oidoid, $dst_offset, $src_offsetobj, $src_offset, $size) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid
 * @param string   $name
 * @param int      $size
 *
 * @return string|bool|array
 */
function rados_getxattr($ioctx, $oid, $name, $size) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid
 * @param string   $name
 * @param string   $value
 *
 * @return bool|array
 */
function rados_setxattr($ioctx, $oid, $name, $value) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid
 * @param string   $name
 *
 * @return bool|array
 */
function rados_rmxattr($ioctx, $oid, $name) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 * This method retuns an assoc array on success with the keys oid, psize, pmtime
 *
 * @param resource $ioctx
 * @param string   $oid
 *
 * @return bool|array
 */
function rados_stat($ioctx, $oid) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $ioctx
 *
 * @return int|bool
 */
function rados_get_last_version($ioctx) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 * This method retuns an assoc array on success
 *
 * @param resource $ioctx
 * @param string   $oid
 *
 * @return bool|array
 */
function rados_getxattrs($ioctx, $oid) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $ioctx
 * @param int      $limit
 * @param string   $start_object_name
 *
 * @return string[]|bool
 */
function rados_objects_list($ioctx, $limit = 0, $start_object_name = NULL) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $snapname
 *
 * @return bool|array
 */
function rados_ioctx_snap_create($ioctx, $snapname) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $snapname
 *
 * @return bool|array
 */
function rados_ioctx_snap_remove($ioctx, $snapname) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $oid
 * @param string   $snapname
 *
 * @return bool|array
 */
function rados_rollback($ioctx, $oid, $snapname) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 * This method retuns an array on success
 *
 * @param resource $ioctx
 * @param int      $maxsnaps
 *
 * @return int[]|bool|array
 */
function rados_ioctx_snap_list($ioctx, $maxsnaps = 256) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param string   $snapid
 *
 * @return int|bool|array
 */
function rados_ioctx_snap_lookup($ioctx, $snapid) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param int      $snapid
 *
 * @return string|bool|array
 */
function rados_ioctx_snap_get_name($ioctx, $snapid) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $ioctx
 * @param int      $snapid
 *
 * @return int|bool|array
 */
function rados_ioctx_snap_get_stamp($ioctx, $snapid) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 * This method retuns an assoc array on success with the keys kb, kb_used, kb_avail, num_objects
 *
 * @param resource $cluster
 *
 * @return bool|array
 */
function rados_cluster_stat($cluster) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 * This method retuns an assoc array on success with the keys num_bytes, num_kb, num_objects, num_object_clones, num_object_copies, num_objects_missing_on_primary, num_objects_unfound, num_objects_degraded, num_rd, num_rd_kb, num_wr, num_wr_kb
 *
 * @param resource $ioctx
 *
 * @return bool|array
 */
function rados_ioctx_pool_stat($ioctx) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 *
 * @return string|bool|array
 */
function rados_cluster_fsid($cluster) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 *
 * @return bool|array
 */
function rados_wait_for_latest_osdmap($cluster) {

}

/**
 * Returns an array or FALSE on failure, the array contains the keys errCode and errMessage
 *
 * @param resource $cluster
 * @param int      $poolid
 *
 * @return string|bool|array
 */
function rados_pool_reverse_lookup($cluster, $poolid) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $cluster
 *
 * @return int|bool
 */
function rados_get_instance_id($cluster) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $ioctx
 *
 * @return int|bool
 */
function rados_ioctx_get_id($ioctx) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $ioctx
 *
 * @return string|bool
 */
function rados_ioctx_get_pool_name($ioctx) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $ioctx
 *
 * @return null|string|bool
 */
function rados_ioctx_get_namespace($ioctx) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource    $ioctx
 * @param string|null $nspace
 *
 * @return null|bool
 */
function rados_ioctx_set_namespace($ioctx, $nspace) {

}

/**
 * Returns FALSE on failure
 *
 * @param resource $ioctx
 *
 * @return int|bool
 */
function rados_ioctx_pool_required_alignment($ioctx) {

}
