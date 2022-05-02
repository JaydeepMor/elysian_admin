<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old characters and then add new characters.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Character::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'Animation'
            ];

            $insert[] = [
                'text' => 'Boy'
            ];

            $insert[] = [
                'text' => 'Boykie'
            ];

            $insert[] = [
                'text' => 'Breaking Voice'
            ];

            $insert[] = [
                'text' => 'Child'
            ];

            $insert[] = [
                'text' => 'Camp'
            ];

            $insert[] = [
                'text' => 'Cowboy'
            ];

            $insert[] = [
                'text' => 'Drunk'
            ];

            $insert[] = [
                'text' => 'Gentlemen'
            ];

            $insert[] = [
                'text' => 'Goofy'
            ];

            $insert[] = [
                'text' => 'Kugel'
            ];

            $insert[] = [
                'text' => 'Mickey Mouse'
            ];

            $insert[] = [
                'text' => 'Miss Positive Pants'
            ];

            $insert[] = [
                'text' => 'Mufasa'
            ];

            $insert[] = [
                'text' => 'News Reader'
            ];

            $insert[] = [
                'text' => 'Old Lady'
            ];

            $insert[] = [
                'text' => 'Old Man'
            ];

            $insert[] = [
                'text' => 'Poppie'
            ];

            $insert[] = [
                'text' => 'Posh British'
            ];

            $insert[] = [
                'text' => 'Tannie'
            ];

            $insert[] = [
                'text' => 'Teenager'
            ];

            $insert[] = [
                'text' => 'Sandtonite'
            ];

            $insert[] = [
                'text' => 'Spongebob'
            ];

            $insert[] = [
                'text' => 'Surfer'
            ];

            $insert[] = [
                'text' => 'Villian'
            ];

            $insert[] = [
                'text' => 'Young Adult'
            ];

            Character::insert($insert);
        }
    }
}
