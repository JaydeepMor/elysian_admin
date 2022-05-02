<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class LoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old admin user and then add new admin.'));

        if ($confirmed) {
            $oldUser = User::find(env('ADMIN_ID'));

            if (!empty($oldUser)) {
                $oldUser->delete();
            }

            $create = [
                'id'        => 1,
                'name'      => env('ADMIN_NAME'),
                'email'     => env('ADMIN_EMAIL'),
                'password'  => \Hash::make(env('ADMIN_PASSWORD'))
            ];

            User::create($create);
        }
    }
}
