<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Section;
use Image;

class CategoryController extends Controller
{
    //get all categories
    public function getCategories()
    {
        $categories = Category::with(['relSection', 'relParent'])->get()->toarray();
        // dd($categories);
        return view('admin.categories', compact('categories'));
    }

    // update category status using ajax
    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }

    //Add or edit a category
    public function addOrEditCategory(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add Category";
            $category = new Category;
            $getCategories = array();
            $msg = "Category has been added";
        } else {
            $title = "Edit Section";
            $category = Category::find($id);
            $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $category['section_id']])->get();
            //dd($getCategories);
            $msg = "Category has been Updated";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($data['category_discount'] == "") {
                $data['category_discount'] == 0;
            }

            // image upload code
            if ($request->hasFile('category_image')) {
                $imgtemp = $request->file('category_image');
                if ($imgtemp->isValid()) {
                    //get image ext
                    $imgext = $imgtemp->getClientOriginalExtension();
                    // generate new image name
                    $imgName = rand(111, 99999) . '.' . $imgext;
                    // save in path
                    $imgpath = 'assets/adminImages/' . $imgName;
                    // upload the image
                    Image::make($imgtemp)->save($imgpath);
                    $category->category_image = $imgName;
                }
            } else {
                $category->category_image = "";
            }

            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();
            return redirect('admin/categories')->with('success_message', $msg);
        }
        //fetch sections in dropdown
        $getSections = Section::get()->toarray();

        return view('admin.add_edit_category')->with(compact('title', 'category', 'msg', 'getSections', 'getCategories'));
    }

    public function appendCategoryLevel(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $data['section_id']])->get()->toarray();
            return view('admin.append_categories_level')->with(compact('getCategories'));
        }
    }

    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        $msg = "Category has been deleted";
         return redirect()->back()->with('success_message', $msg);
    }

    // delete just category image
    public function deleteCategoryImage($id)
    {
        //get category image
        $get_category_image = Category::select('category_image')->where('id', $id)->first();
        // get cat image path
        $get_category_image_path = "assets/adminImages/";
        //delete category image from image folder
        if (file_exists($get_category_image_path.$get_category_image->category_image)) {
            unlink($get_category_image_path.$get_category_image->category_image);
        }

        // Delete category image from DB
        Category::where('id', $id)->update(['category_image' => '']);
        $msg = "Category image has been deleted";
        return redirect()->back()->with('success_message', $msg);
    }
}
