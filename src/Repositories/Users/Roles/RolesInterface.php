<?php

namespace App\Repositories\Users\Roles;


interface RolesInterface {

	/**
	 * @param array $params optional
	 *
	 * @return \stdClass
	 */
	public function index( array $params = array() );


	/**
	 * @param array $params
	 *
	 */
	public function update( array $params );

	/**
	 * @return $model Bican\Roles\Models\Role
	 */
	public function getRoles();

	/**
	 * gets Permission Groups with Permissions
	 * @return array();
	 */
	public function getPermissionGroupsWithPermissions();

	/**
	 * Builds data structure for edit roles and permissions view
	 * @return array()
	 */
	public function buildViewEditData();


	/**
	 * Removes permission from role
	 *
	 * @param $role_id
	 * @param $permission_id
	 *
	 * @return void
	 */
	public function deleteRolePermission( $role_id, $permission_id );


	/**
	 * Add permission to role
	 *
	 * @param $role_id
	 * @param $permission_id
	 *
	 * @return void
	 */
	public function addRolePermission( $role_id, $permission_id );
}