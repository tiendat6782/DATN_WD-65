<?php

namespace Database\Seeders;

use App\Models\ProductIncoming;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductIncomingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductIncoming::factory()->count(5)->create();
    }
}
