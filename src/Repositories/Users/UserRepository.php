<?php

namespace App\Repositories\Users;

use App\Events\UserWasCreated;
use App\Models\Users\User;
use Illuminate\Support\Facades\DB;

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

    private function datatableSearch(){
        $total = DB::table('users')
            ->where('users.nicename', 'like', '%'.$_GET['search']['value'].'%')
            ->orderBy('id', 'ASC')->get();

        $niz = DB::table('users')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->where('users.nicename', 'like', '%'.$_GET['search']['value'].'%')
            ->offset($_GET['start'])
            ->limit($_GET['length'])
            ->orderBy('id', 'ASC')->get();
        echo json_encode(array(
            "draw" => $_GET['draw'],
            "recordsTotal" => count($total),
            "recordsFiltered"=>count($total),
            "data" => $niz
        ));
    }

    /**
     * @inheritdoc
     */

    public function datatable(){
        //Ako je pretraga u pitanju
        if(isset($_GET['search']['value']) && $_GET['search']['value'] != ''){

            $this->datatableSearch();

        }
        // Ako nije pretraga
        else {
            $total = User::all();

            $niz = DB::table('users')
//            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
//            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
//            ->select('users.*', 'roles.name as role_name')
                ->select('users.*')
                ->offset($_GET['start'])
                ->limit($_GET['length'])
                ->orderBy('id', 'ASC')->get();

            echo json_encode(array(
                "draw" => $_GET['draw'],
                "recordsTotal" => count($total),
                "recordsFiltered"=>count($total),
                "data" => $niz
            ));      // echo results
        }
    }
}