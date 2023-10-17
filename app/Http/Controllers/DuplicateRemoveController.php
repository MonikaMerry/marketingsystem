<?php

namespace App\Http\Controllers;


use App\Models\Lead;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Exporter;
use App\Exports\InvoicesExport;
use App\Exports\UniqueValuesExport;
use PHPUnit\Event\TestSuite\Loaded;

class DuplicateRemoveController extends Controller
{

  // view duplicate remove page
  public function viewDuplicatePage()
  {


    return view('admin.forms.lead.exportlead');
  }

  // logic for remove 

  public function checkDuplicateValue(Request $request)
  {

    // request excel file
    $file = $request->file('check-data');

    $data = Excel::toArray([], $file);
    
    $collect_data = collect($data[0])->flatten(1);
    // collect unique data
    $unique_data = array_unique($collect_data->toArray());

    // get leads mobile numbes
    $mobile_number = Lead::pluck('mobile_number')->toArray();

    //  remove duplicate values
    $remove_dupli_values = array_chunk(array_values(array_filter(array_diff($unique_data, $mobile_number))), 1);
   

    return Excel::download(new UniqueValuesExport($remove_dupli_values), 'unique_numbers.xlsx');
  }
}
