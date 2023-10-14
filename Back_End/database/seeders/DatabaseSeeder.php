<?php

namespace Database\Seeders;

use Database\Factories\CategoriesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            ProductSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            CartSeeder::class,
            CategorySeeder::class,
            ReviewSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            ReturnRequestSeeder::class,
            GalerySeeder::class,
            AttributeSeeder::class,
            RoleSeeder::class,
            ProductIncomingSeeder::class,
        ]);
    }
}
