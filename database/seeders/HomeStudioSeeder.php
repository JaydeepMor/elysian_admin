<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeStudio;

class HomeStudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old home studios and then add new home studios.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            HomeStudio::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'Available'
            ];

            HomeStudio::insert($insert);
        }
    }
}
