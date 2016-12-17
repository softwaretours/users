<?php

use Illuminate\Database\Seeder;
use App\Models\Users\PermissionRole;

class PermissionsRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permission_role')->delete();
        $data = json_decode(\File::get("database/data/seeds/permission_role.json"));
        foreach ($data as $obj) {
            PermissionRole::create(array(
                'role_id' => $obj->role_id,
                'permission_id' => $obj->permission_id,
            ));
        }
    }
}
