<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            'tamilnadu',
            'kerala',
            'andhrapradesh',
        ];

        foreach ($states as $key => $value) {
            $state = new State();
            $state->state = $value;
            $state->save();
            if ($state->state == 'tamilnadu') {
                $districts = ['chennai', 'salem', 'trichy', 'madurai', 'coimbatore', 'virudhunagar', 'ambur'];
                foreach ($districts as $key => $districtName) {
                    $district = new District();
                    $district->state_id = $state->id;
                    $district->district = $districtName;
                    $district->save();
                }
            }
        }
    }
}
