<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecord = [
            ['id'=>1, 'vendor_id'=>1, 'account_holder_name'=>'John Wren', 'bank_name'=>'Meezan Bank', 'account_number'=>'1561315', 'bank_ifsc_code'=>'213212'],
        ];
        VendorsBankDetails::insert($vendorRecord);
    }
}
