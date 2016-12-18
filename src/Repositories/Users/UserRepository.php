<?php

namespace App\Repositories\Users;

use App\Events\UserWasCreated;
use App\Models\Users\User;

class UserRepository implements UserInterface
{

    /**
     *  Form validation rules
     */
    private $validatorCreateDataSite = array(
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed'
    );

    private $validatorCreateDataSystem = array(
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'account_source' => 'required|max:255',
        'status' => 'required',
        'account_id' => 'required',
        'parent_id' => 'required',
        'api_key' => 'required|min:16|max:16'
    );

    private $validatorUpdateDataSystem = array(
        'name' => 'required|max:255',
        'account_source' => 'required|max:255',
        'status' => 'required',
        'account_id' => 'required',
        'parent_id' => 'required',
        'api_key' => 'required|min:16|max:16'
    );

    /**
     * @inheritdoc
     */
    public function createUser(array $data)
    {

        $input = $data;
        $input['password'] = bcrypt($data['password_text']);
        $user = User::create($input);
        event(new UserWasCreated($this, array('id' => $user->id)));

        return $user;
    }

    /**
     * @inheritdoc
     */
    public function findUser($id)
    {
        return User::find($id);
    }

    /**
     * @inheritdoc
     */
    public function updateUser(array $data, array $user_row)
    {
        User::where($user_row)->update($data);
    }

    /**
     * @inheritdoc
     */
    public function deleteUser(array $user_row)
    {
        User::where($user_row)->delete();
    }

    /**
     * @inheritdoc
     */
    public function getValidatorCreateDataSite()
    {
        return $this->validatorCreateDataSite;
    }

    /**
     * @inheritdoc
     */
    public function getValidatorCreateDataSystem()
    {
        return $this->validatorCreateDataSystem;
    }

    /**
     * @inheritdoc
     */
    public function getValidatorUpdateDataSystem()
    {
        return $this->validatorUpdateDataSystem;
    }
}