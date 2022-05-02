<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryStyle;

class DeliveryStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmed = $this->command->confirm(__('Are you sure ? Because script will remove old delivery styles and then add new delivery styles.'));

        if ($confirmed) {
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DeliveryStyle::truncate();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $insert[] = [
                'text' => 'Announcer'
            ];

            $insert[] = [
                'text' => 'Auctioneer'
            ];

            $insert[] = [
                'text' => 'Audio Book'
            ];

            $insert[] = [
                'text' => 'AVM'
            ];

            $insert[] = [
                'text' => 'Bright'
            ];

            $insert[] = [
                'text' => 'Camp'
            ];

            $insert[] = [
                'text' => 'Commentator'
            ];

            $insert[] = [
                'text' => 'Conversational'
            ];

            $insert[] = [
                'text' => 'Corporate'
            ];

            $insert[] = [
                'text' => 'Documentary'
            ];

            $insert[] = [
                'text' => 'Dramatic'
            ];

            $insert[] = [
                'text' => 'Hard Sell'
            ];

            $insert[] = [
                'text' => 'Hard Soft Sell'
            ];

            $insert[] = [
                'text' => 'Intimate'
            ];

            $insert[] = [
                'text' => 'Introduction'
            ];

            $insert[] = [
                'text' => 'Informative'
            ];

            $insert[] = [
                'text' => 'IVR'
            ];

            $insert[] = [
                'text' => 'AVM'
            ];

            $insert[] = [
                'text' => 'Jingle'
            ];

            $insert[] = [
                'text' => 'Line-Ups'
            ];

            $insert[] = [
                'text' => 'Medium Sell'
            ];

            $insert[] = [
                'text' => 'Movie Trailer'
            ];

            $insert[] = [
                'text' => 'Narrator'
            ];

            $insert[] = [
                'text' => 'Neutral'
            ];

            $insert[] = [
                'text' => 'News Reader'
            ];

            $insert[] = [
                'text' => 'PC Board'
            ];

            $insert[] = [
                'text' => 'PG Board'
            ];

            $insert[] = [
                'text' => 'Poet'
            ];

            $insert[] = [
                'text' => 'Presenter'
            ];

            $insert[] = [
                'text' => 'Promo'
            ];

            $insert[] = [
                'text' => 'Radio'
            ];

            $insert[] = [
                'text' => 'Reporter'
            ];

            $insert[] = [
                'text' => 'Retail'
            ];

            $insert[] = [
                'text' => 'Sexy'
            ];

            $insert[] = [
                'text' => 'Showreel'
            ];

            $insert[] = [
                'text' => 'Singing'
            ];

            $insert[] = [
                'text' => 'Soft Sell'
            ];

            $insert[] = [
                'text' => 'Straight Read'
            ];

            $insert[] = [
                'text' => 'Sultry'
            ];

            $insert[] = [
                'text' => 'Voice Message'
            ];

            DeliveryStyle::insert($insert);
        }
    }
}
