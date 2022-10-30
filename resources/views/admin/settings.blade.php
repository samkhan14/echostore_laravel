@extends('admin.layouts.master_layouts')
@section('content')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Settings</h3>
                  <h6 class="font-weight-normal mb-0">Update Admin Password</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                    <form class="forms-sample" method="POST" action="{{ url('/admin/update-admin-password')}}" name="updateAdminPass" id="updateAdminPass">
                      @csrf
                        <div class="form-group">
                        <label for="exampleInputUsername1">Admin Type</label>
                        <input  class="form-control" value="{{$adminDetails['type']}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Email address</label>
                        <input class="form-control" value="{{$adminDetails['email']}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Current Password">
                      </div>
                      <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>


      @endsection
