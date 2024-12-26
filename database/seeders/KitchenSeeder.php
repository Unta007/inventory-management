<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\KitchenFactory;

class KitchenSeeder extends Seeder
{

    public function run()
    {
        KitchenFactory::new()->count(50)->create();
    }
}
