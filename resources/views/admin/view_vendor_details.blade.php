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
         <div class="row">
            <div class="col-md-6 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

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
                                <input type="text" value="{{ $vendorDetails['vendor_personal']['state']}}"
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Country</label>
                                <input type="text" class="form-control"
                                    value="{{ $vendorDetails['vendor_personal']['country']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Pin Code</label>
                                <input type="text" class="form-control"
                                    value="{{ $vendorDetails['vendor_personal']['pincode']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile No.</label>
                                <input type="tel" class="form-control"
                                    value="{{ $vendorDetails['vendor_personal']['mobile']}}" readonly>
                            </div>

                            <div class="form-group">

                                @if (!empty($vendorDetails['image']))
                                <a target="_blank"
                                    href="{{ url('assets/adminImages/' .$vendorDetails['image']) }}">
                                    <img src="{{ url('assets/adminImages/' . $vendorDetails['image']) }}"
                                        alt="Admin Image" width="150" height="150">
                                    <input type="hidden" name="currentAdminImage"
                                        value="{{ $vendorDetails['image'] }}">
                                </a>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
