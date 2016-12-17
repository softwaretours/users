<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        $data = json_decode(\File::get("database/data/seeds/roles.json"));
        foreach ($data as $obj) {
            Role::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'slug' => $obj->slug,
                'description' => $obj->description,
                'level' => $obj->level,
            ));
        }
    }
}
