<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::get();
        return view('admin.forms.state.state', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.state.create-state');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'state' => ['required', 'unique:states,state'],
        ]);


        $state_data = new State;
        $state_data->state = $request->state;
        $state_data->save();

        return redirect('state')->with('success', 'State Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        $edit_state = State::find($state->id);
        return view('admin.forms.state.edit-state', compact('edit_state'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $validatedData = $request->validate([
            'state' => ['required', 'unique:states,state,' . $state->id],
        ]);


        $update_state =  State::find($state->id);
        $update_state->state = $request->state;
        $update_state->save();

        return redirect('state')->with('success', 'State Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $delete_state = State::find($state->id);
        $delete_state->delete();
        return redirect('state')->with('danger', 'State Deleted Successfully');
    }
}
