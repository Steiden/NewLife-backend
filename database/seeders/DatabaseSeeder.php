<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\AdvertAddress;
use App\Models\AdvertPhoto;
use App\Models\Locality;
use App\Models\Region;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\AdvertFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Region::factory(10)->create();
        Locality::factory(10)->create();
        AdvertAddress::factory(10)->create();
        Advert::factory(10)->create();
        AdvertPhoto::factory(30)->create();
    }
}
