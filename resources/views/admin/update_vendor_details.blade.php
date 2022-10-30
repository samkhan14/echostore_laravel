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
                    <form class="forms-sample" method="POST" action="{{ url('/admin/update-vendor-details/personal') }}"
                        name="updateVendorDetails" id="updateVendorDetails" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputUsername1">Admin Type</label>
                            <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$vendorsDetails['name']}}" class="form-control" id="name"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" name="address" class="form-control" value="{{$vendorsDetails['address']}}" id="Address"
                                placeholder="Address" value>
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" name="city" value="{{$vendorsDetails['city']}}" class="form-control" id="city"
                                placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="name">State</label>
                            <input type="text" name="state" value="{{$vendorsDetails['state']}}" class="form-control" id="State"
                                placeholder="State">
                        </div>
                        <div class="form-group">
                            <label for="name">Country</label>
                            <input type="text" name="country" class="form-control" value="{{$vendorsDetails['country']}}" id="Country"
                                placeholder="Country">
                        </div>
                        <div class="form-group">
                            <label for="name">Pin Code</label>
                            <input type="text" name="pincode" class="form-control" value="{{$vendorsDetails['pincode']}}" id="pinCode"
                                placeholder="Pin Code">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No.</label>
                            <input type="tel" name="mobile" class="form-control" value="{{$vendorsDetails['mobile']}}" id="mobile"
                                placeholder="Mobile" minlength="11" maxlength="11">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input class="form-control" value="{{$vendorsDetails['email']}}"  readonly>
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
                <form class="forms-sample" method="POST" action="{{ url('/admin/update-vendor-details/business') }}"
                    name="updateVendorDetails" id="updateVendorDetails" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Email address</label>
                        <input class="form-control" value="{{$vendorsDetails['email']}}"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="name"> Shop Name</label>
                        <input type="text" name="name" value="{{$vendorsDetails['name']}}" class="form-control" id="name"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="name"> Shop Address</label>
                        <input type="text" name="address" class="form-control" value="{{$vendorsDetails['address']}}" id="Address"
                            placeholder="Address" value>
                    </div>
                    <div class="form-group">
                        <label for="name"> Shop City</label>
                        <input type="text" name="city" value="{{$vendorsDetails['city']}}" class="form-control" id="city"
                            placeholder="City">
                    </div>
                    <div class="form-group">
                        <label for="name"> Shop State</label>
                        <input type="text" name="state" value="{{$vendorsDetails['state']}}" class="form-control" id="State"
                            placeholder="State">
                    </div>
                    <div class="form-group">
                        <label for="name"> Shop Country</label>
                        <input type="text" name="country" class="form-control" value="{{$vendorsDetails['country']}}" id="Country"
                            placeholder="Country">
                    </div>
                    <div class="form-group">
                        <label for="name"> Shop Pin Code</label>
                        <input type="text" name="pincode" class="form-control" value="{{$vendorsDetails['pincode']}}" id="pinCode"
                            placeholder="Pin Code">
                    </div>
                    <div class="form-group">
                        <label for="mobile Shop ">Shop Mobile No.</label>
                        <input type="tel" name="mobile" class="form-control" value="{{$vendorsDetails['mobile']}}" id="mobile"
                            placeholder="Mobile" minlength="11" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label for="mobile Shop ">Shop Website</label>
                        <input type="tel" name="Website" class="form-control" value="{{$vendorsDetails['Website']}}" id="Website"
                            placeholder="Website">
                    </div>
                    <div class="form-group">
                        <label for="Shop Address Proof">Shop Address Proof</label>
                        <select class="form-control" name="address_proof" id="address_proof">
                            <option value="Passport">Passport</option>
                            <option value="Voting Cards">Voting Cards</option>
                            <option value="PAN">PAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Shop Address Proof Image">Shop Address Proof Image</label>
                        <input type="file" name="adminImage" class="form-control" id="adminImage">
                            <a target="_blank"
                                href="{{ url('assets/adminImages/'.$vendorsDetails['Website']) }}">
                                <img src="{{ url('assets/adminImages/' . ) }}"
                                    alt="Admin Image" width="150" height="150">
                                <input type="hidden" name="current_address_proof_image"
                                    value="{{  }}">
                            </a>
                    </div>
                    <div class="form-group">
                        <label for="name"> Business License Number</label>
                        <input type="text" name="ban_number" class="form-control" value="{{$vendorsDetails['pincode']}}" id="pinCode"
                            placeholder="Pin Code">
                    </div>
                    <div class="form-group">
                        <label for="name"> GST Number</label>
                        <input type="text" name="gst_number" class="form-control" value="{{$vendorsDetails['pincode']}}" id="pinCode"
                            placeholder="Pin Code">
                    </div>
                    <div class="form-group">
                        <label for="name"> Pan Number</label>
                        <input type="text" name="pan_number" class="form-control" value="{{$vendorsDetails['pincode']}}" id="pinCode"
                            placeholder="Pin Code">
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@elseif ($slug == 'bank')
@endif


@endsection
