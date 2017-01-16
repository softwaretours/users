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
        \DB::table('users')->delete();

        $userRepository = new UserRepository();
        $data = json_decode(\File::get("database/data/seeds/users.json"));
        foreach ($data as $obj) {
            $userRepository->createUser((array)$obj);
        }


    }
}
