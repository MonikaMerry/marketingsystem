<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{

    // list the leads data  

    public function leadLists()
    {
        $list_data = Lead::get();
        return view('admin.forms.leadlist', compact('list_data'));
    }

    // view lead page

    public function createPage()
    {
        return view('admin.forms.createlist');
    }

    // create lead

    public function createLead(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required'],
            'phone_number' => ['required'],
            'district' => ['required'],
        ]);

        $create_data = new Lead;
        $create_data->name = $request->name;
        $create_data->mobile_number = $request->phone_number;
        $create_data->district = $request->district;
        $create_data->save();

        return redirect('lead-list')->with('success', 'Lead created successfully');
    }

    // edit lead data

    public function editLead($id)
    {
        $edit_lead = Lead::find($id);
        return view('admin.forms.editlist', compact('edit_lead'));

        // return view('admin.forms.editlist');
    }

    // update lead data

    public function updateLead(Request $request)
    {

        $update_lead = Lead::find($request->id);
        $update_lead->name = $request->name;
        $update_lead->mobile_number = $request->phone_number;
        $update_lead->district = $request->district;
        $update_lead->save();

        return redirect('lead-list')->with('info', 'Lead Updated Successfully');
    }

    // delete lead

    public function deleteLead($id)
    {
        $delete_lead = Lead::find($id);
        $delete_lead->delete();

        return redirect('lead-list')->with('danger', 'Lead Deleted Successfully');
    }
}
