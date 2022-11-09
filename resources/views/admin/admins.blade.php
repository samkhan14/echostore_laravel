@extends('admin.layouts.master_layouts')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Admin ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                           Type
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($admins as $admin)
                        <tr>
                          <td>
                            {{ $admin['id'] }}
                          </td>
                          <td>
                          {{ $admin['name']}}
                          </td>
                          <td>
                          {{ $admin['type'] }}
                          </td>
                          <!-- <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td> -->
                          <td>
                          {{ $admin['mobile'] }}
                          </td>
                          <td>
                          {{ $admin['email'] }}
                          </td>
                          <td>
                            <img src="{{ asset('assets/adminImages/'.$admin['image']) }}" alt="">
                          </td>
                          <td>
                         @if($admin['status'] == 1)
                         <i style="font-size:25px;" class="mdi mdi-bookmark-check"></i>
                          @else
                          <i style="font-size:25px;" class="mdi mdi-bookmark-outline"></i>
                          @endif
                          </td>
                          <td>
                            @if($admin['type'] == "vendor")
                            <a href="{{ url('admin/view-vendor-details/'.$admin['id'])}}">
                               <i style="font-size:25px;" class="mdi mdi-file-document-box"></i>
                            </a>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>


        @endsection
