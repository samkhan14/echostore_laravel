@extends('admin.layouts.master_layouts')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sections</h4>
                        <a class="btn btn-primary btn-sm" href="{{ url('admin/add-edit-section')}}">Add Section</a>
                        <div class="table-responsive pt-3">
                            @if (Session::has('success_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success_message') }}
                            </div>
                            @endif
                            <table id="sections" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $section)
                                    <tr>
                                        <td>
                                            {{ $section['id'] }}
                                        </td>
                                        <td>
                                            {{ $section['name']}}
                                        </td>
                                        <td>
                                            @if($section['status'] == 1)
                                            <a class="updateSectionStatus" id="section-{{$section['id']}}" section_id="{{ $section['id']}}" href="javascript:void(0)">
                                                <i style="font-size:25px;" class="mdi mdi-bookmark-check" status="active"></i>
                                            </a>
                                            @else
                                            <a class="updateSectionStatus" id="section-{{$section['id']}}" section_id="{{ $section['id']}}" href="javascript:void(0)">
                                                <i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-section/'.$section['id'])}}">
                                                <i style="font-size:25px;" class="mdi mdi-pencil-box"></i>
                                            </a>
                                 <a href="javascript:void(0)" class="confirm_delete" module="section" moduleid="{{ $section['id'] }}">
                                                <i style="font-size:25px;" class="mdi mdi-file-excel-box"></i>
                                            </a>
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
