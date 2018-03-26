<?php
/**
 * Created by PhpStorm.
 * User: kevinmeijer
 * Date: 26/03/2018
 * Time: 18:06
 */

declare(strict_types = 1);

namespace WarriorXK\PHPRados;

class AIOContext {

    protected $_resource = NULL;

    /**
     * @param resource $resource
     */
    public function __construct($resource) {

        var_dump(get_resource_type($resource));

        $this->_resource = $resource;

    }

}
