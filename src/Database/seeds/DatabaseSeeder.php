<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/**
    	 *  Populate Permission Groups and Permissions
    	 */
        $this->call(PermissionGroupsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        /**
         *  Populate Roles and attach permission to roles
         */
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsRoleTableSeeder::class);

        /**
         *  Populate users
         */
        $this->call(UsersTableSeeder::class);

    }
}
