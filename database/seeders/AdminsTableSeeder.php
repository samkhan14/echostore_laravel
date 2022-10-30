<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id' => 2, 'name' => 'John','type' => 'vendor', 'vendor_id' => 1, 'mobile' => '1548452124', 'email' => 'john1429@gmailcom','password' => '$2a$12$xkoz8kx6ODgDZvYUc/f8K.cgaSmhpI4NYd/pWh0pxZ6fxu9jii9P2', 'image' => '', 'status' => 0],
        ];
        Admin::insert($adminRecords);
        }
}
