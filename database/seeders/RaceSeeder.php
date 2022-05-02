<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Race;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old races and then add new races.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Race::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'African'
            ];

            $insert[] = [
                'text' => 'Asian'
            ];

            $insert[] = [
                'text' => 'Caucasian'
            ];

            $insert[] = [
                'text' => 'Colored'
            ];

            $insert[] = [
                'text' => 'Indian'
            ];

            Race::insert($insert);
        }
    }
}
