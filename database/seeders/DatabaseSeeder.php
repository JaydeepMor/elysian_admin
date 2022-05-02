<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LoginUserSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(AgeGroupSeeder::class);
        $this->call(RaceSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(AccentSeeder::class);
        $this->call(DeliveryStyleSeeder::class);
        $this->call(CharacterSeeder::class);
        $this->call(ImpersonationSeeder::class);
        $this->call(HomeStudioSeeder::class);
    }
}
