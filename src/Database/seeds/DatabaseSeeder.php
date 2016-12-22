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
        $this->call(PermissionGroupsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsRoleTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        //        $this->call(RoleUserTableSeeder::class);
        //        $this->call(PermissionsUserTableSeeder::class);

    }
}
