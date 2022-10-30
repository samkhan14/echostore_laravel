<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetails;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    // admin dashboard
    // LOGIC 1
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // admin Login
    // LOGIC 2
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email'    => 'required|email|max:100',
                'password' => 'required',
            ];

            $customMsgs_for_validation = [
                'email.required' => 'Email is Required',
                'email.email' => 'Valid Email is Required',
                'password.required' => 'Password is Valid Required'
            ];

            $this->validate($request, $rules, $customMsgs_for_validation);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }

        return view('admin.login');
    }

    // LOGIC 3
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    // LOGIC 4
    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //  echo "<pre>";
            //  print_r($data);
            // check current pass is correct or not
            if (Hash::check($data['currentPassword'], Auth::guard('admin')->user()->password)) {
                if ($data['newPassword'] === $data['confirmPassword']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['newPassword'])]);
                    return redirect()->back()->with('success_message', 'Password has been updated!');
                } else {
                    return redirect()->back()->with('error_message', 'Password Does not Matched with confirm password');
                }
            } else {
                return redirect()->back()->with('error_message', 'Invalid Current Password');
            }
        }

        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        // echo "<pre>";
        // print_r($adminDetails);
        return view('admin.settings', compact('adminDetails'));
    }

    // CHECK ADMIN PASS from ajax
    // LOGIC 5
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        echo "<pre>";
        print_r($data);
        die;
        // if(Hash::check($data['currentPassword'],Auth::guard('admin')->user()->password)){
        //     return "true";
        // }else{
        //     return "false";
        // }
    }

    // LOGIC 6
    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile' => 'required|numeric',
            ];

            $customMsgs = [
                'name.required' => 'Name is Must',
                'name.regex' => 'Valid name is required',
                'mobile.required' => 'Mobile No is required',
                'mobile.numeric' => 'Mobile No is Valid required'
            ];

            // image upload code
            if ($request->hasFile('adminImage')) {
                $imgtemp = $request->file('adminImage');
                if ($imgtemp->isValid()) {
                    //get image ext
                    $imgext = $imgtemp->getClientOriginalExtension();
                    // generate new image name
                    $imgName = rand(111, 99999) . '.' . $imgext;
                    // save in path
                    $imgpath = 'assets/adminImages/' . $imgName;
                    // upload the image
                    Image::make($imgtemp)->save($imgpath);
                }
            } elseif (!empty($data['current_address_proof_image'])) {
                $imgName = $data['current_address_proof_image'];
            } else {
                $imgName = "";
            }

            $this->validate($request, $rules, $customMsgs);
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['mobile'], 'image' => $imgName]);
            return redirect()->back()->with('success_message', 'Admin Details has been Updated');
        }
        return view('admin.update_admin_details');
    }

    // LOGIC 7
    public function updateVendorDetails($slug, Request $request)
    {
        if ($slug == "personal") {
            //rules
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'mobile' => 'required|numeric',
                ];

                $customMsgs = [
                    'name.required' => 'Name is Must',
                    'name.regex' => 'Valid name is required',
                    'mobile.required' => 'Mobile No is required',
                    'mobile.numeric' => 'Mobile No is Valid required'
                ];

                // image upload code
                if ($request->hasFile('adminImage')) {
                    $imgtemp = $request->file('adminImage');
                    if ($imgtemp->isValid()) {
                        //get image ext
                        $imgext = $imgtemp->getClientOriginalExtension();
                        // generate new image name
                        $imgName = rand(111, 99999) . '.' . $imgext;
                        // save in path
                        $imgpath = 'assets/adminImages/' . $imgName;
                        // upload the image
                        Image::make($imgtemp)->save($imgpath);
                    }
                } elseif (!empty($data['currentAdminImage'])) {
                    $imgName = $data['currentAdminImage'];
                } else {
                    $imgName = "";
                }

                $this->validate($request, $rules, $customMsgs);

                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['mobile'], 'image' => $imgName]);

                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'name' => $data['name'], 'address' => $data['address'], 'city' => $data['city'], 'state' => $data['state'], 'country' => $data['country'], 'pincode' => $data['pincode'], 'mobile' => $data['mobile']
                ]);
                return redirect()->back()->with('success_message', 'Vendor Details has been Updated');
            }
            $vendorsDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }
        // logic for business details
        elseif ($slug == "business") {
            if ($request->isMethod('post')) {
                $data = $request->all();

                $rules = [
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile' => 'required|numeric',
                ];

                $customMsgs = [
                    'shop_name.required' => 'Name is Must',
                    'Shop_name.regex' => 'Valid name is required',
                    'shop_mobile.required' => 'Mobile No is required',
                    'shop_mobile.numeric' => 'Mobile No is Valid required'
                ];

                // image upload code
                if ($request->hasFile('address_proof_image')) {
                    $imgtemp = $request->file('address_proof_image');
                    if ($imgtemp->isValid()) {
                        //get image ext
                        $imgext = $imgtemp->getClientOriginalExtension();
                        // generate new image name
                        $imgName = rand(111, 99999) . '.' . $imgext;
                        // save in path
                        $imgpath = 'assets/adminImages/' . $imgName;
                        // upload the image
                        Image::make($imgtemp)->save($imgpath);
                    }
                } elseif (!empty($data['currentAdminImage'])) {
                    $imgName = $data['currentAdminImage'];
                } else {
                    $imgName = "";
                }

                $this->validate($request, $rules, $customMsgs);

                VendorsBusinessDetails::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'name' => $data['name'], 'address' => $data['address'], 'city' => $data['city'], 'state' => $data['state'], 'country' => $data['country'], 'pincode' => $data['pincode'], 'mobile' => $data['mobile'], 'shop_website' => $data['shop_website'], 'address_proof' => $data['address_proof'], 'address_proof_image' => $imgName,
                ]);

                return redirect()->back()->with('success_message', 'Vendor Business Details has been Updated');
            }
            $vendorsDetails = VendorsBusinessDetails::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } elseif ($slug == "bank") {
            # code...
        }

        return view('admin.update_vendor_details', compact('slug', 'vendorsDetails'));
    }

    // class end
}
