<?php

namespace App\Repositories\Users\Permissions;

use App\Models\Users\PermissionGroup;
use App\Models\Users\PermissionRole;
use App\Models\Users\PermissionUser;
use App\Models\Users\User;
use Bican\Roles\Models\Permission;

class PermissionRepository implements PermissionInterface
{


    /**@{@inheritdoc}
     * @param array $params
     * @return \stdClass
     */
    public function index(array $params)
    {
        $user = User::find($params['user_id']);
        //Get permission groups
        $permission_groups = PermissionGroup::get();

        $permissions = Permission::get();

        $page_format = new \PageFormat(['title' => 'User permissions', 'h1' => $user->name.' '.$user->last_name.' Permissions']);
        $data = new \stdClass();
        $data->user = $user;
        $data->permission_groups = $permission_groups;
        $data->permissions = $permissions;
        $data->titles = $page_format->makeTitle();
        return $data;
    }


    /**
     * @param array $params
     *
     */
    public function update(array $params)
    {
        $request = $params['request'];
        $params = $request->except(['user_id', '_token', '_method']);
        $user_id = $request->get('user_id');
        PermissionUser::where('user_id', $user_id)->delete();
        foreach($params as $key => $value){
            $key = str_replace('_', '.', $key);
            $permission = Permission::where('slug', $key)->first();
            if(!is_null($permission))
                PermissionUser::create(['user_id' => $user_id, 'permission_id' => $permission->id]);
        }
    }
}