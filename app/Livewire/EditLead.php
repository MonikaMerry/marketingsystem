<?php

namespace App\Livewire;

use App\Models\District;
use Livewire\Component;

class EditLead extends Component
{
    public $states;
    public $districts;
    public $edit_lead;
    public $state_id;
    public $district_id;
    public $name;
    public $mobile_number;
    public $languange;
    public function mount($districts, $states, $edit_lead)
    {
        $this->states = $states;
        $this->districts = $districts;
        $this->edit_lead = $edit_lead;
        $this->name      = $edit_lead->name;
        $this->mobile_number  = $edit_lead->mobile_number;
        $this->languange      = $edit_lead->languange;
        if ($edit_lead->state_id) {
            $this->state_id = $edit_lead->state_id;
            $this->districts = District::where('state_id', $edit_lead->state_id)->get();
        }
        if ($edit_lead->district_id) {
            $this->district_id = $edit_lead->district_id;
        }
    }
    public function render()
    {
        return view('livewire.edit-lead');
    }

    public function loadDistricts()
    {
        $this->districts = District::where('state_id', $this->state_id)->get();
    }
}
