<?php

namespace App\Http\Controllers;

use App\Imports\LeadsImport;
use App\Models\District;
use App\Models\Lead;
use App\Models\LeadComment;
use App\Models\State;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\helper;


class LeadController extends Controller
{

    // list the leads data  

    public function leadLists()
    {
        $list_data = Lead::with('stateData', 'districtData')->where('status', '!=', 'activated')->get();
        //   return $list_data;
        return view('admin.forms.lead.leadlist', compact('list_data'));
    }

    // view lead page

    public function createPage(Request $request)
    {
        $state_names = State::get();
        $district_names = District::get();
        return view('admin.forms.lead.createlist', compact('state_names', 'district_names'));
    }



    public function createLead(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'phone_number' => ['required', 'unique:leads,mobile_number', 'digits:10'],
            'state_name' => ['required', 'max:15'],
            'district_name' => ['required', 'max:15'],
        ]);

        $create_lead = new Lead;
        $create_lead->name = $request->name;
        $create_lead->mobile_number = $request->phone_number;
        $create_lead->state_id = $request->state_name;
        $create_lead->district_id = $request->district_name;
        $create_lead->language = $request->language;
        $create_lead->save();

        return redirect('lead-list')->with('success', 'Lead created successfully');
    }

    // edit lead data

    public function editLead($id)
    {
        $edit_lead = Lead::find($id);
        $states = State::get();
        $districts = District::get();
        return view('admin.forms.lead.editlist', compact('edit_lead', 'states', 'districts'));
    }

    public function getDistrict(Request $request)
    {
        $sid = $request->post('sid');

        $district = DB::table('districts')->where('state_id', $sid)->get();
        $html = '<option value="">Select District</option>';
        foreach ($district as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->district . '</option>';
        }
        echo $html;
    }

    // update lead data

    public function updateLead(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'phone_number' => ['required', 'digits:10'],
            'state_id' => ['required', 'max:15'],
            'district_id' => ['required', 'max:15'],
            'language' => ['required',],
        ]);

        $update_lead = Lead::find($request->id);
        $update_lead->name = $request->name;
        $update_lead->mobile_number = $request->phone_number;
        $update_lead->state_id = $request->state_id;
        $update_lead->district_id = $request->district_id;
        $update_lead->language = $request->language;

        // return $update_lead;
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

    // histroy section

    public function histroyPage()
    {
        $histroy_data = Lead::with('comments', 'stateData', 'districtData','comment','user')->where('status', 'activated')->get();
        $user = LeadComment::with('userNames')->get();
        // return $user;
        // Lead::where('id', $lead_id)->update(['last_contact_time' => now()->toDateTimeString()]);

        // $histroy_datas = LeadComment::with('userNames')->latest()->get();
        //    return $user;
        return view('admin.forms.lead.histroy', compact('histroy_data','user'));
    }

    // import view page

    public function viewImportPage()
    {
        return view('admin.forms.lead.importlead');
    }
    // import data function
    public function importData(Request $request)
    {



        Excel::import(new LeadsImport, request()->file('file'));

        return redirect('lead-list')->with('info', 'Import Data Successfully');
    }
}
