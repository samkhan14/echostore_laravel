<?php

namespace Database\Seeders;

use App\Models\Vendor;
use App\Models\VendorsBusinessDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1, 'vendor_id'=>1, 'shop_name'=>'John electronic store', 'shop_address'=>'1233-c karachi', 'shop_city'=>'karachi', 'shop_state'=>'sindh','shop_country'=>'Pakistan','shop_pincode'=>'98745', 'shop_mobile_no'=>'987463215', 'shop_website'=>'sitemakers.pk', 'shop_email'=>'john1429@gmail.com', 'address_proof'=>'Passport','address_proof_image'=>'test.jpg', 'business_license_number'=>'987456321','gst_number'=>'5484312','pan_number'=>'25465412'],
        ];

        VendorsBusinessDetails::insert($vendorRecords);
    }
}
