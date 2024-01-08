<?php

namespace App\Livewire;

use App\Models\District;
use Livewire\Component;

class CreateLead extends Component
{
    public $states;
    public $districts;
    public $state_id;
    public function mount($states)
    {
        $this->states = $states;
    }
    public function render()
    {
        return view('livewire.create-lead');
    }

    public function loadDistricts()
    {
        $this->districts = District::where('state_id', $this->state_id)->get();
    }
}
