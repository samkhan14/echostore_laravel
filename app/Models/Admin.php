<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';

    public function vendorPersonal()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function vendorBusinessDetails()
    {
        return $this->belongsTo('App\Models\VendorsBusinessDetails', 'vendor_id');
    }

    public function vendorBankDetails()
    {
        return $this->belongsTo('App\Models\VendorsBankDetails', 'vendor_id');
    }
}
