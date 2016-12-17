<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();
        $data = json_decode(\File::get("database/data/seeds/permissions.json"));
        foreach ($data as $obj) {
            Permission::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'slug' => $obj->slug,
                'description' => $obj->description,
                'permission_group_id' => $obj->permission_group_id,
            ));
        }
    }
}
