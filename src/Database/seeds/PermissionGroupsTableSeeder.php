<?php

use Illuminate\Database\Seeder;

class PermissionGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('permission_groups')->delete();
        $data = json_decode(\File::get("database/data/seeds/permission_groups.json"));
        foreach ($data as $obj) {
            \App\Models\Users\PermissionGroup::create(array(
                'name' => $obj->name,
                'description' => $obj->description,
                'key' => $obj->key
            ));
        }
    }
}
