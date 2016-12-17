<?php

use Illuminate\Database\Seeder;
use App\Models\Users\PermissionUser;

class PermissionsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permission_user')->delete();
        $data = json_decode(\File::get("database/data/seeds/permission_user.json"));
        foreach ($data as $obj) {
            PermissionUser::create(array(
                'user_id' => $obj->user_id,
                'permission_id' => $obj->permission_id,
            ));
        }
    }
}
