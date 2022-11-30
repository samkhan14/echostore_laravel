@extends('admin.layouts.master_layouts')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Categories</h4>
                        <a class="btn btn-primary btn-sm" href="{{ url('admin/add-edit-category')}}">Add Category</a>
                        <div class="table-responsive pt-3">
                            @if (Session::has('success_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success_message') }}
                            </div>
                            @endif
                            <table id="categories" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Parent Category
                                        </th>
                                        <th>
                                            Section
                                        </th>
                                        <th>
                                            URL
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
                                    @foreach($categories as $category)
                                    <!-- if condition for add sudo name if data is not exist -->
                                    @if(isset($category['relparent']['category_name']) && !empty($category['relparent']['category_name']))
                                    @php $parent_name = $category['relparent']['category_name']; @endphp
                                    @else
                                    @php $parent_name = "Root"; @endphp
                                    @endif
                                    <tr>
                                        <td>
                                            {{ $category['id'] }}
                                        </td>
                                        <td>
                                            {{ $category['category_name']}}
                                        </td>
                                        <td>
                                            {{ $parent_name}}
                                        </td>
                                        <td>
                                            {{ $category['rel_section']['name']}}
                                        </td>
                                        <td>
                                            <a href="{{ $category['url']}}">{{ $category['url']}}</a>
                                        </td>

                                        <td>
                                            @if($category['status'] == 1)
                                            <a class="updateCategoriestatus" id="category-{{$category['id']}}" category_id="{{ $category['id']}}" href="javascript:void(0)">
                                                <i style="font-size:25px;" class="mdi mdi-bookmark-check" status="active"></i>
                                            </a>
                                            @else
                                            <a class="updateCategoriestatus" id="category-{{$category['id']}}" category_id="{{ $category['id']}}" href="javascript:void(0)">
                                                <i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-category/'.$category['id'])}}">
                                                <i style="font-size:25px;" class="mdi mdi-pencil-box"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="confirm_delete" module="category" moduleid="{{ $category['id'] }}">
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
