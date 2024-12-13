<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\BeverageFactory;

class BeverageSeeder extends Seeder
{
    public function run()
    {
        BeverageFactory::new()->count(50)->create();
    }
}
