<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::with('states')->get();
        return view('admin.forms.district.district',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $state_list = State::get();
        return view('admin.forms.district.create-district',compact('state_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'district' => ['required'],
        ]);


        $district_data = new District;
        $district_data->district = $request->district;
        $district_data->state_id = $request->state_id;
        $district_data->save();

        return redirect('district')->with('success','District Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        $state_list = State::get();
        $edit_district = District::find($district->id);
        
        //  return $edit_district;
        return view('admin.forms.district.edit-district',compact('edit_district','state_list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        $validatedData = $request->validate([
            'district' => ['required'],
        ]);


        $update_district = District::find($district->id);
        $update_district ->district = $request->district;
        $update_district->state_id = $request->state_name;
        $update_district ->save();
        
        return redirect('district')->with('success','District Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $delete_district = District::find($district->id);
        $delete_district->delete();
        return redirect('district')->with('danger', 'District Deleted Successfully');
    }
}
