@extends('admin.layouts.master_layouts')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h6 class="font-weight-normal mb-0">Vendor Details</h6>
                        <a href="{{ url('admin/admins/vendor') }}">Back to Vendors</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- content row start -->
        <div class="row">
            <!-- details of vendor personal information -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Vendor Personal Information</div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input class="form-control" value="{{ $vendorDetails['vendor_personal'] ['email']}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $vendorDetails['vendor_personal'] ['name']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" value="{{ $vendorDetails['vendor_personal']['city']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">State</label>
                            <input type="text" value="{{ $vendorDetails['vendor_personal']['state']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Country</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Pin Code</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No.</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile']}}" readonly>
                        </div>

                        <div class="form-group">
                            @if (!empty($vendorDetails['image']))
                            <label for="mobile">Vendor Image</label> <br>
                            <a target="_blank" href="{{ url('assets/adminImages/' .$vendorDetails['image']) }}">
                                <img src="{{ url('assets/adminImages/' . $vendorDetails['image']) }}" alt="Admin Image" width="150" height="150">
                                <input type="hidden" name="currentAdminImage" value="{{ $vendorDetails['image'] }}">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- details of vendor Business Information -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Vendor Business Information</div>
                        <div class="form-group">
                            <label>Shop Email address</label>
                            <input class="form-control" value="{{ $vendorDetails['vendor_business_details'] ['shop_email']}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Shop Name</label>
                            <input value="{{ $vendorDetails['vendor_business_details'] ['shop_name']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Shop Address</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business_details']['shop_address'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Shop City</label>
                            <input type="text" value="{{ $vendorDetails['vendor_business_details']['shop_city']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Shop State</label>
                            <input type="text" value="{{ $vendorDetails['vendor_business_details']['shop_state']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Shop Country</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business_details']['shop_country']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Shop Pin Code</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business_details']['shop_pincode']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Shop Mobile No.</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_business_details']['shop_mobile_no']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Shop Website</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_business_details']['shop_website']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Address Proof</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_business_details']['address_proof']}}" readonly>
                        </div>

                        <div class="form-group">
                            @if (!empty($vendorDetails['vendor_business_details']['address_proof_image']))
                            <label for="mobile">Address Proof Image</label> <br>
                            <a target="_blank" href="{{ url('assets/adminImages/' .$vendorDetails['image']) }}">
                                <img src="{{ url('assets/adminImages/' . $vendorDetails['image']) }}" alt="Admin Image" width="150" height="150">
                                <input type="hidden" name="currentAdminImage" value="{{ $vendorDetails['image'] }}">
                            </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mobile">Business Licence Number</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_business_details']['business_license_number']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">GST Number</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_business_details']['gst_number']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">PAN Number</label>
                            <input type="tel" class="form-control" value="{{ $vendorDetails['vendor_business_details']['pan_number']}}" readonly>
                        </div>

                    </div>
                </div>
            </div>

            <!-- details for vendor bank info -->
            <div class="col-md-6 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Vendor Bank Information</div>

                        <div class="form-group">
                            <label for="name">Account Holder Name</label>
                            <input value="{{ $vendorDetails['vendor_bank_details'] ['account_holder_name']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Bank Name</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank_details']['bank_name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Account Number</label>
                            <input type="text" value="{{ $vendorDetails['vendor_bank_details']['account_number']}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Bank IFSC Code</label>
                            <input type="text" value="{{ $vendorDetails['vendor_bank_details']['bank_ifsc_code']}}" class="form-control" readonly>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @endsection
