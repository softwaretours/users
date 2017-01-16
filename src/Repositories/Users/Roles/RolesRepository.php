<?php

namespace App\Repositories\Users\Roles;

use App\Models\Users\PermissionGroup;
use App\Models\Users\PermissionRole;
use App\Models\Users\PermissionUser;
use App\Models\Users\User;
use Bican\Roles\Models\Permission;

use Bican\Roles\Models\Role;

class RolesRepository implements RolesInterface {


	/**@{@inheritdoc}
	 * @param array $params optional
	 *
	 * @return \stdClass
	 */
	public function index( array $params = array() ) {
		//Get permission groups
		$permission_groups = Role::get();
		$permissions       = Permission::get();

		$data                    = new \stdClass();
		$data->permission_groups = $permission_groups;
		$data->permissions       = $permissions;

		return $data;
	}

	/**
	 * @return $model Bican\Roles\Models\Role
	 */
	public function getRoles() {

		$roles = Role::get();

		return $roles;
	}

	/**
	 * @return array();
	 */
	public function getPermissionGroupsWithPermissions() {

		$permissionGroups = PermissionGroup::get();

		foreach ( $permissionGroups as &$pGroup ) {
			$pGroup['permissions'] = PermissionGroup::find( $pGroup->id )->permissions->toArray();
		}

		return $permissionGroups->toArray();
	}

	public function roleHasPermission( $role_id, $permission_id ) {

		$roleHasPermission = PermissionRole::where( [
			'role_id'       => $role_id,
			'permission_id' => $permission_id
		] )->first();

		return count( $roleHasPermission ) > 0 ? 1 : 0;
	}

	/**
	 * Builds data structure for edit roles and permissions view
	 * @return array()
	 */
	public function buildViewEditData() {

		$roles            = $this->getRoles();
		$permissionGroups = $this->getPermissionGroupsWithPermissions();

		foreach ( $roles as &$role ) {

			foreach ( $permissionGroups as &$pGroup ) {
				foreach ( $pGroup['permissions'] as &$permission ) {
					$permission['hasPermission'] = $this->roleHasPermission( $role['id'], $permission['id'] );
				}
			}

			$role['permissionGroups'] = $permissionGroups;

		}

		return $roles->toArray();
	}

	/**
	 * @param $role_id
	 * @param $permission_id
	 */
	public function deleteRolePermission( $role_id, $permission_id ) {
		PermissionRole::where( 'role_id', $role_id )->where( 'permission_id', $permission_id )->delete();
	}

	public function addRolePermission( $role_id, $permission_id ) {
		PermissionRole::create( [ 'role_id' => $role_id, 'permission_id' => $permission_id ] );
	}


	/**
	 * @param array $params
	 *
	 */
	public function update( array $params ) {
		$request = $params['request'];
		$params  = $request->except( [
			'user_id',
			'_token',
			'_method'
		] );
		$user_id = $request->get( 'user_id' );
		PermissionUser::where( 'user_id', $user_id )->delete();
		foreach ( $params as $key => $value ) {
			$key        = str_replace( '_', '.', $key );
			$permission = Permission::where( 'slug', $key )->first();
			if ( ! is_null( $permission ) ) {
				PermissionUser::create( [
					'user_id'       => $user_id,
					'permission_id' => $permission->id
				] );
			}
		}
	}
}