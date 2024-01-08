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
        $list_data = Lead::with('stateNames')->where('status', '!=', 'activated')->get();
        // $data= $list_data[0]->state;
        //  $district = District::where('id')->get();
        // $district =  getDistrictName();
        // return $list_data;
        // $district= getDistrictName($data);
        // return $district;

        return view('admin.forms.lead.leadlist', compact('list_data'));
    }

    // view lead page

    public function createPage(Request $request)
    {
       $states= State::get();
        return view('admin.forms.lead.createlist',compact('states'));
    }

   

    public function createLead(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'phone_number' => ['required', 'unique:leads,mobile_number', 'digits:10'],
            'state' => ['required', 'max:15'],
            'districts' => ['required', 'max:15'],

        ]);

        $create_data = new Lead;
        $create_data->name = $request->name;
        $create_data->mobile_number = $request->phone_number;
        $create_data->state = $request->state;
        $create_data->district = $request->districts;
        $create_data->language = $request->language;
        $create_data->save();

        return redirect('lead-list')->with('success', 'Lead created successfully');
    }

    // edit lead data

    public function editLead($id)
    {
        $edit_lead = Lead::find($id);
        // $edit_lead = 
        return view('admin.forms.lead.editlist', compact('edit_lead'));

        // return view('admin.forms.editlist');
    }

    public function getDistrict(Request $request){
        $sid = $request->post('sid'); 

        $district = DB::table('districts')->where('state_id',$sid)->get();
        $html='<option value="">Select District</option>';
        foreach ($district as $list) {
        $html.='<option value="'.$list->id.'">'.$list->district.'</option>';
          
        }
        echo $html;
    }

    // update lead data

    public function updateLead(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'phone_number' => ['required', 'digits:10'],
            'districts' => ['required', 'max:15'],
            'state' => ['required', 'max:15'],
        ]);

        $update_lead = Lead::find($request->id);
        $update_lead->name = $request->name;
        $update_lead->mobile_number = $request->phone_number;
        $update_lead->state = $request->state;
        $update_lead->district = $request->districts;
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
        $histroy_data = Lead::where('status', 'activated')->get();
        return view('admin.forms.lead.histroy', compact('histroy_data'));
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

    // district 

    public function districtPage()
    {
        $districts = District::get();
        return view('admin.forms.lead.district',compact('districts'));
    }
    public function statePage()
    {
        $states = State::get();
        return view('admin.forms.lead.state',compact('states'));
    }
}
