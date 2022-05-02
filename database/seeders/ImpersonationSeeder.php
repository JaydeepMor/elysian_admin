<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Impersonation;

class ImpersonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old impersonations and then add new impersonations.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Impersonation::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'Michael Jackson'
            ];

            $insert[] = [
                'text' => 'Nelson Mandela'
            ];

            Impersonation::insert($insert);
        }
    }
}
