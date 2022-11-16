<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(AdminsTableSeeder::class);
       // $this->call(VendorsTableSeeder::class);
       // $this->call(VendorsBusinessTableSeeder::class);
       //$this->call(VendorsBankTableSeeder::class);
       $this->call(SectionTableSeeder::class);
    }
}
