<?php

use App\Models\Lead;
use Illuminate\Support\Facades\App;
use App\Models\District;
use App\Models\State;

function getDistrictName($data){
    $datas = State::where('id',$data)->first();
    return $datas;
}










?>