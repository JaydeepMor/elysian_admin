<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AgeGroup;

class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old age groups and then add new age group.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            AgeGroup::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => '6 - 8'
            ];

            $insert[] = [
                'text' => '9 - 12'
            ];

            $insert[] = [
                'text' => '13 - 17'
            ];

            $insert[] = [
                'text' => '18 - 24'
            ];

            $insert[] = [
                'text' => '25 - 30'
            ];

            $insert[] = [
                'text' => '31 - 39'
            ];

            $insert[] = [
                'text' => '40 - 49'
            ];

            $insert[] = [
                'text' => '50 - 59'
            ];

            $insert[] = [
                'text' => '60+'
            ];

            AgeGroup::insert($insert);
        }
    }
}
