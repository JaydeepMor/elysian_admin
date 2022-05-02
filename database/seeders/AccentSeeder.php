<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accent;

class AccentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old accents and then add new accents.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Accent::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'African'
            ];

            $insert[] = [
                'text' => 'African American'
            ];

            $insert[] = [
                'text' => 'Afrikaans'
            ];

            $insert[] = [
                'text' => 'Atlantic'
            ];

            $insert[] = [
                'text' => 'American'
            ];

            $insert[] = [
                'text' => 'Australian'
            ];

            $insert[] = [
                'text' => 'American Southern'
            ];

            $insert[] = [
                'text' => 'Brazilian'
            ];

            $insert[] = [
                'text' => 'British'
            ];

            $insert[] = [
                'text' => 'Brooklyn'
            ];

            $insert[] = [
                'text' => 'Bulgarian'
            ];

            $insert[] = [
                'text' => 'Canadian'
            ];

            $insert[] = [
                'text' => 'Cape Tonian'
            ];

            $insert[] = [
                'text' => 'Caribbean'
            ];

            $insert[] = [
                'text' => 'Chinese'
            ];

            $insert[] = [
                'text' => 'Cockney'
            ];

            $insert[] = [
                'text' => 'Coloured Accent'
            ];

            $insert[] = [
                'text' => 'Dutch'
            ];

            $insert[] = [
                'text' => 'East Rand'
            ];

            $insert[] = [
                'text' => 'French'
            ];

            $insert[] = [
                'text' => 'German'
            ];

            $insert[] = [
                'text' => 'Greek'
            ];

            $insert[] = [
                'text' => 'Indian'
            ];

            $insert[] = [
                'text' => 'Iranian'
            ];

            $insert[] = [
                'text' => 'Irish'
            ];

            $insert[] = [
                'text' => 'Italian'
            ];

            $insert[] = [
                'text' => 'Jamaican'
            ];

            $insert[] = [
                'text' => 'Lisp'
            ];

            $insert[] = [
                'text' => 'Jewish'
            ];

            $insert[] = [
                'text' => 'Mexican'
            ];

            $insert[] = [
                'text' => 'Nigerian'
            ];

            $insert[] = [
                'text' => 'New York'
            ];

            $insert[] = [
                'text' => 'Polish'
            ];

            $insert[] = [
                'text' => 'Portuguese'
            ];

            $insert[] = [
                'text' => 'Russian'
            ];

            $insert[] = [
                'text' => 'Scottish'
            ];

            $insert[] = [
                'text' => 'Spanish'
            ];

            $insert[] = [
                'text' => 'South African'
            ];

            $insert[] = [
                'text' => 'Turkish'
            ];

            $insert[] = [
                'text' => 'Welsh'
            ];

            $insert[] = [
                'text' => 'Yorkshire'
            ];

            Accent::insert($insert);
        }
    }
}
