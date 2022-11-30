<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{

    public function sections()
    {
        $sections = Section::get()->toarray();
        return view('sections.sections', compact('sections'));
    }

    // update section status using ajax
    public function updateSectionStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            }
            else{
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'section_id' => $data['section_id']]);

        }
    }

    // delete section
    public function deleteSection($id)
    {
        Section::where('id', $id)->delete();
        $msg = "Section has been deleted";
        return redirect()->back()->with('success_message', $msg);
    }

    //Add or edit a section
    public function addOrEditSection(Request $request, $id=null)
    {
        if ($id == "") {
            $title = "Add Section";
            $section = new Section;
            $msg = "Section has been added";
        }
        else{
            $title = "Edit Section";
            $section = Section::find($id);
            $msg = "Section has been Updated";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'section_name' => 'required|regex:/^[\pL\s\-]+$/u'
            ];

            $customMsgs = [
                'section_name.required' => 'Section Name is Must',
            ];

            $this->validate($request, $rules, $customMsgs);

            $section->name = $data['section_name'];
            $section->status = 1;
            $section->save();
            return redirect('admin/sections')->with('success_message', $msg);
        }

        return view('sections.add_edit_section')->with(compact('title', 'section', 'msg'));

    }

}
