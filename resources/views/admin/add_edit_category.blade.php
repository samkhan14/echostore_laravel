@extends('admin.layouts.master_layouts')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Catalouge Management</h3>
                        <h6 class="font-weight-normal mb-0">{{ $title}}</h6>
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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="forms-sample" @if(empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/'.$category['id']) }}" @endif method="POST" name="updateAdminDetails" id="updateAdminDetails" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name" @if(!empty($category['category_name'])) value="{{ $category['category_name']}}" @else value="{{ old('category_name')}}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                                <select name="section_id" id="section_id" class="form-control" style="color: #000;">
                                    <option value="blank">Select</option>
                                    @foreach($getSections as $gsection)
                                    <option value="{{$gsection['id']}}" @if(!empty($category['section_id']) && $category['section_id'] == $gsection['id']) selected @endif>{{ $gsection['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="appendCategoriesLevel">
                                @include('admin.append_categories_level')
                            </div>
                            <div class="form-group">
                                    <label for="mobile">Select Category Image</label>
                                    <input type="file" name="category_image" class="form-control" id="categoryImage" required> <br>
                                    @if(!empty($category['category_image']))
                                 <a href="javascript:void(0);">
                                    <img src=" {{url('assets/adminImages/'.$category['category_image']) }}" alt="category_image"  width="150" height="150">
                                 </a> <br> <br>
                                 <a href="javascript:void(0);" class="confirm_delete" module="category-image" moduleid="{{ $category['id'] }}">
                                    Delete Category Image
                                </a>
                                 @endif
                           </div>
                           <div class="form-group">
                                <label for="name">Category Discount</label>
                                <input type="text" id="category_disc" name="category_discount" class="form-control" placeholder="Category Discount" @if(!empty($category['category_discount'])) value="{{ $category['category_discount']}}" @else value="{{ old('category_discount')}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="name">Category URL</label>
                                <input type="text" id="category_url" name="url" class="form-control" placeholder="Category URL" @if(!empty($category['url'])) value="{{ $category['url']}}" @else value="{{ old('url')}}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="Category Meta title" @if(!empty($category['meta_title'])) value="{{ $category['meta_title']}}" @else value="{{ old('meta_title')}}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Description</label>
                                <input type="text" id="meta_description" name="meta_description" class="form-control" placeholder="Meta Description" @if(!empty($category['meta_description'])) value="{{ $category['meta_description']}}" @else value="{{ old('meta_description')}}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Keywords</label>
                                <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" placeholder="Meta Keywords" @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords']}}" @else value="{{ old('meta_keywords')}}" @endif>
                            </div>



                            <button type="submit" class="btn btn-primary mr-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endsection
