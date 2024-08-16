<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function changeStatus(Request $request){

        // Fetch the record based on the provided ID
        $updateInput = DB::table($request['table_name'])->where('id', $request['id'])->first();

        // Update the 'status' column based on the provided 'type'
        $updateInput->status = ($request['type'] == 'unassign') ? 'inactive' : 'active';

        // Update the record in the database
        DB::table($request['table_name'])->where('id', $request['id'])->update((array) $updateInput);
    }

    public function page_not_found(){
        $data['menu'] = '404';
        return view('admin.errors.404', $data);
    }
}
