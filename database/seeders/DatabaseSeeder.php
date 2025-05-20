<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ApiKeySeeder;
use Database\Seeders\SubmissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ApiKeySeeder::class,
            DepartmentSeeder::class,
            SubmissionSeeder::class,
        ]);
    }
}
