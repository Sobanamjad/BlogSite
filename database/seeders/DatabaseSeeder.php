<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            RoleSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            PostTagSeeder::class,
        ]);
    }
}
