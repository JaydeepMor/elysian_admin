<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old languages and then add new languages.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Language::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'Afrikaans'
            ];

            $insert[] = [
                'text' => 'Arabic'
            ];

            $insert[] = [
                'text' => 'Bengali'
            ];

            $insert[] = [
                'text' => 'Bulgarian'
            ];

            $insert[] = [
                'text' => 'Burmese'
            ];

            $insert[] = [
                'text' => 'Croatian'
            ];

            $insert[] = [
                'text' => 'Czech'
            ];

            $insert[] = [
                'text' => 'Danish'
            ];

            $insert[] = [
                'text' => 'Dutch'
            ];

            $insert[] = [
                'text' => 'English'
            ];

            $insert[] = [
                'text' => 'Finnish'
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
                'text' => 'Hawain'
            ];

            $insert[] = [
                'text' => 'Hebrew'
            ];

            $insert[] = [
                'text' => 'Hindi'
            ];

            $insert[] = [
                'text' => 'Hungarian'
            ];

            $insert[] = [
                'text' => 'Icelandic'
            ];

            $insert[] = [
                'text' => 'Indonesian'
            ];

            $insert[] = [
                'text' => 'Italian'
            ];

            $insert[] = [
                'text' => 'Japanese'
            ];

            $insert[] = [
                'text' => 'Korean'
            ];

            $insert[] = [
                'text' => 'Latin'
            ];

            $insert[] = [
                'text' => 'Ndebele'
            ];

            $insert[] = [
                'text' => 'Northern Sotho'
            ];

            $insert[] = [
                'text' => 'Norwegian'
            ];

            $insert[] = [
                'text' => 'Persian'
            ];

            $insert[] = [
                'text' => 'Pidgin'
            ];

            $insert[] = [
                'text' => 'Polish'
            ];

            $insert[] = [
                'text' => 'Portuguese'
            ];

            $insert[] = [
                'text' => 'Romanian'
            ];

            $insert[] = [
                'text' => 'Russian'
            ];

            $insert[] = [
                'text' => 'Rwanda'
            ];

            $insert[] = [
                'text' => 'Samoan'
            ];

            $insert[] = [
                'text' => 'Sepedi'
            ];

            $insert[] = [
                'text' => 'Serbian'
            ];

            $insert[] = [
                'text' => 'Shona'
            ];

            $insert[] = [
                'text' => 'Somali'
            ];

            $insert[] = [
                'text' => 'Sotho'
            ];

            $insert[] = [
                'text' => 'Southern Sotho'
            ];

            $insert[] = [
                'text' => 'Spanish'
            ];

            $insert[] = [
                'text' => 'Swahili'
            ];

            $insert[] = [
                'text' => 'Swati'
            ];

            $insert[] = [
                'text' => 'Swedish'
            ];

            $insert[] = [
                'text' => 'ZThai'
            ];

            $insert[] = [
                'text' => 'Tsonga'
            ];

            $insert[] = [
                'text' => 'Turkish'
            ];

            $insert[] = [
                'text' => 'Tswana'
            ];

            $insert[] = [
                'text' => 'Ukrainian'
            ];

            $insert[] = [
                'text' => 'Vietnamese'
            ];

            $insert[] = [
                'text' => 'Welsh'
            ];

            $insert[] = [
                'text' => 'Venda'
            ];

            $insert[] = [
                'text' => 'Xhosa'
            ];

            $insert[] = [
                'text' => 'Zulu'
            ];

            Language::insert($insert);
        }
    }
}
