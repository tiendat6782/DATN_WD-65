<?php

namespace Database\Seeders;

use App\Models\ReturnRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReturnRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReturnRequest::factory()->count(5)->create();
    }
}
