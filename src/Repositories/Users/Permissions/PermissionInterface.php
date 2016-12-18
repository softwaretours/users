<?php

namespace App\Repositories\Users\Permissions;


interface PermissionInterface
{

    /**
     * @param array $params
     * @return \stdClass
     */
    public function index(array $params);



    /**
     * @param array $params
     *
     */
    public function update(array $params);



}