<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorsRecord = [
            ['id' => 1, 'name' => 'John', 'address' => 'North khi,karachi pk', 'city' => 'karachi', 'state' => 'Sindh', 'country' => 'Paksitan', 'pincode' => '98741', 'mobile' => '9874556321', 'email' => 'john1429@gmail.com', 'status' => '0'],
        ];
        Vendor::insert($vendorsRecord);
    }
}
