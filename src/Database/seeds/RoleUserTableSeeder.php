<?php

use Illuminate\Database\Seeder;
use App\Models\Users\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_user')->delete();
        $data = json_decode(\File::get("database/data/seeds/role_user.json"));
        foreach ($data as $obj) {
            RoleUser::create(array(
                'role_id' => $obj->role_id,
                'user_id' => $obj->user_id,
            ));
        }
    }
}
