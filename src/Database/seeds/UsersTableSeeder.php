<?php

use Illuminate\Database\Seeder;
use App\Repositories\Users\UserRepository;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //        \DB::table('users')->delete();
        //        $data = json_decode(\File::get("database/data/seeds/users.json"));
        //        foreach ($data as $obj) {
        //            User::create(array(
        //                'id' => $obj->id,
        //                'name' => $obj->name,
        //                'last_name' => $obj->last_name,
        //                'email' => $obj->email,
        //                'password' => bcrypt($obj->password),
        //                'password_text' => $obj->password,
        //                'status' => $obj->status,
        //                'parent_id' => $obj->parent_id
        //            ));
        //        }
        \DB::table('users')->delete();

        $userRepository = new UserRepository();
        $data = json_decode(\File::get("database/data/seeds/users.json"));
        foreach ($data as $obj) {
            $userRepository->createUser((array)$obj);
        }


    }
}
