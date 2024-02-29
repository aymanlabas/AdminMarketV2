<?php

namespace Database\Seeders;

use App\Models\Stocke;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Stocke::factory()->count(10)->create();
    }
}
