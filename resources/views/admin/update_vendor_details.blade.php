@extends('admin.layouts.master_layouts')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                        <h6 class="font-weight-normal mb-0">Update Vendor Details</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- content row start -->
        @if ($slug == 'personal')
        <!-- for personal slug -->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">
                        @if (Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error_message') }}
                        </div>
                        @endif
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success_message') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="forms-sample" method="POST"
                            action="{{ url('/admin/update-vendor-details/personal') }}" name="updateVendorDetails"
                            id="updateVendorDetails" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputUsername1">Admin Type</label>
                                <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$vendorsDetails['name']}}" class="form-control"
                                    id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{$vendorsDetails['address']}}" id="Address" placeholder="Address" value>
                            </div>
                            <div class="form-group">
                                <label for="name">City</label>
                                <input type="text" name="city" value="{{$vendorsDetails['city']}}" class="form-control"
                                    id="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="name">State</label>
                                <input type="text" name="state" value="{{$vendorsDetails['state']}}"
                                    class="form-control" id="State" placeholder="State">
                            </div>
                            <div class="form-group">
                                <label for="name">Country</label>
                                <!-- <input type="text" name="country" class="form-control"
                                    value="{{$vendorsDetails['country']}}" id="Country" placeholder="Country"> -->

                                    <select class="form-control" name="country" id="country">
                                    <option class="form-control" value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option @if($country['country_name'] == $vendorsDetails['country']) selected @endif value="{{ $country['country_name']}}">{{ $country['country_name']}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Pin Code</label>
                                <input type="text" name="pincode" class="form-control"
                                    value="{{$vendorsDetails['pincode']}}" id="pinCode" placeholder="Pin Code">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile No.</label>
                                <input type="tel" name="mobile" class="form-control"
                                    value="{{$vendorsDetails['mobile']}}" id="mobile" placeholder="Mobile"
                                    minlength="11" maxlength="11">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input class="form-control" value="{{$vendorsDetails['email']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Select Admin Image</label>
                                <input type="file" name="adminImage" class="form-control" id="adminImage">
                                @if (!empty(Auth::guard('admin')->user()->image))
                                <a target="_blank"
                                    href="{{ url('assets/adminImages/' . Auth::guard('admin')->user()->image) }}">
                                    <img src="{{ url('assets/adminImages/' . Auth::guard('admin')->user()->image) }}"
                                        alt="Admin Image" width="150" height="150">
                                    <input type="hidden" name="currentAdminImage"
                                        value="{{ Auth::guard('admin')->user()->image }}">
                                </a>
                                @endif


                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif ($slug == 'business')
        <!-- for business slug -->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error_message') }}
                        </div>
                        @endif
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success_message') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="forms-sample" method="POST"
                            action="{{ url('/admin/update-vendor-details/business') }}" name="updateVendorDetails"
                            id="updateVendorDetails" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="shop_email" value="{{$vendorsDetails['shop_email']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name"> Shop Name</label>
                                <input type="text" name="shop_name" value="{{$vendorsDetails['shop_name']}}" class="form-control"
                                    id="name" placeholder="Shop Name">
                            </div>
                            <div class="form-group">
                                <label for="name"> Shop Address</label>
                                <input type="text" name="shop_address" class="form-control"
                                    value="{{$vendorsDetails['shop_address']}}" id="Address" placeholder="Shop Address" value>
                            </div>
                            <div class="form-group">
                                <label for="name"> Shop City</label>
                                <input type="text" name="shop_city" value="{{$vendorsDetails['shop_city']}}" class="form-control"
                                    id="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="name"> Shop State</label>
                                <input type="text" name="shop_state" value="{{$vendorsDetails['shop_state']}}"
                                    class="form-control" id="State" placeholder="State">
                            </div>
                            <div class="form-group">
                                <label for="name"> Shop Country</label>
                                <input type="text" name="shop_country" class="form-control"
                                    value="{{$vendorsDetails['shop_country']}}" id="Country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="name"> Shop Pin Code</label>
                                <input type="text" name="shop_pincode" class="form-control"
                                    value="{{$vendorsDetails['shop_pincode']}}" id="pinCode" placeholder="Pin Code">
                            </div>
                            <div class="form-group">
                                <label for="mobile Shop ">Shop Mobile No.</label>
                                <input type="tel" name="shop_mobile_no" class="form-control"
                                    value="{{$vendorsDetails['shop_mobile_no']}}" id="mobile" placeholder="Shop Mobile"
                                    minlength="11" maxlength="11">
                            </div>
                            <div class="form-group">
                                <label for="mobile Shop ">Shop Website</label>
                                <input type="tel" name="shop_website" class="form-control"
                                    value="{{$vendorsDetails['shop_website']}}" id="Website" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <label for="Shop Address Proof">Shop Address Proof</label>
                                <select class="form-control" name="address_proof" id="address_proof">
                                    <option value="Passport" @if($vendorsDetails['address_proof'] == "Passport") selected @endif
                                    >Passport</option>
                                    <option value="Voting Cards" @if($vendorsDetails['address_proof'] == "Voting Cards") selected @endif>Voting Cards</option>
                                    <option value="PAN" @if($vendorsDetails['address_proof'] == "PAN") selected @endif>PAN</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name"> Business License Number</label>
                                <input type="text" name="business_license_number" class="form-control"
                                    value="{{$vendorsDetails['business_license_number']}}" id="business_license_number" placeholder="Business License Number">
                            </div>
                            <div class="form-group">
                                <label for="name"> GST Number</label>
                                <input type="text" name="gst_number" class="form-control"
                                    value="{{$vendorsDetails['gst_number']}}" id="gst_number" placeholder="Pin Code">
                            </div>
                            <div class="form-group">
                                <label for="name"> Pan Number</label>
                                <input type="text" name="pan_number" class="form-control"
                                    value="{{$vendorsDetails['pan_number']}}" id="pan_number" placeholder="Pan Number">
                            </div>
                            <div class="form-group">
                                <label for="Shop Address Proof Image">Shop Address Proof Image</label>
                                <input type="file" name="address_proof_image" class="form-control" id="address_proof_image">
                                @if(!empty($vendorsDetails['address_proof_image']))
                                <a target="_blank"
                                    href="{{ url('assets/adminImages/'.$vendorsDetails['address_proof_image']) }}">
                                    <img src="{{ url('assets/adminImages/'.$vendorsDetails['address_proof_image']) }}"
                                        alt="Admin Image" width="150" height="150">
                                    <input type="hidden" name="current_address_proof_image"
                                        value="{{ $vendorsDetails['address_proof_image'] }}">
                                </a>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        @elseif ($slug == 'bank')
         <!-- for bank slug -->
         <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error_message') }}
                        </div>
                        @endif
                        @if (Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success_message') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="forms-sample" method="POST"
                            action="{{ url('/admin/update-vendor-details/bank') }}" name="updateVendorDetails"
                            id="updateVendorDetails" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="shop_email" value="{{ Auth::guard('admin')->user()->email}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name"> Account Holder Name</label>
                                <input type="text" name="account_holder_name" value="{{$vendorsDetails['account_holder_name']}}" class="form-control" id="name" placeholder="Account Holder Name">
                            </div>
                            <div class="form-group">
                                <label for="name"> Bank Name</label>
                                <input type="text" name="bank_name" class="form-control"
                                    value="{{$vendorsDetails['bank_name']}}" id="bank_name" placeholder="Bank Name" value>
                            </div>
                            <div class="form-group">
                                <label for="name"> Account Number</label>
                                <input type="text" name="account_number" value="{{$vendorsDetails['account_number']}}" class="form-control"
                                    id="account_number" placeholder="Account Number">
                            </div>
                            <div class="form-group">
                                <label for="name"> Bank IFSC Code</label>
                                <input type="text" name="bank_ifsc_code" value="{{$vendorsDetails['bank_ifsc_code']}}"
                                    class="form-control" id="bank_ifsc_code" placeholder="Bank IFSC Code">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif


        @endsection
