<?php

namespace App\Repositories\Users;


interface UserInterface
{
    /**
     * Create new user
     * @param array $data
     * @return \App\Models\Users\User
     */
    public function createUser(array $data);

    /**
     * @param $id
     * @return \App\Models\Users\User
     */
    public function findUser($id);

    /**
     * Update user
     * @param array $data
     * @param array $user_row
     * @return \App\Models\Users\User
     */
    public function updateUser(array $data, array $user_row);

    /**
     * Delete user
     * @param array $user_row
     * @return void
     */
    public function deleteUser(array $user_row);

    /**
     * Create user form validation site
     * @return array
     */
    public function getValidatorCreateDataSite();

    /**
     * Create user form validation system
     * @return array
     */
    public function getValidatorCreateDataSystem();

    /**
     * Update user form validation system
     * @return array
     */
    public function getValidatorUpdateDataSystem();

    /**
     * Initialize datatable with users
     * @return mixed
     */
    public function datatable();


}