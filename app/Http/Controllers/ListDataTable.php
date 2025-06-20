<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoogleForm;
class ListDataTable extends Controller
{
    //
    public function index()
    {
        return view('datatable');
    }

    public function list(Request $request){
        $keywords = $request->search;
        $limit = $request->input('length');

        $rawquery = GoogleForm::where(function($query) use ($keywords) {
            $query->where('emp_code', 'LIKE', "%$keywords%");
        });

        $totalRecords = $rawquery->get()->count();

        if ($request->input('draw') > 1) {
 
            $start = $request->input('start');
 
            $column = $request->input('order.0.column');
            $direction = $request->input('order.0.dir');
            $order = $request->input('columns')[$column]['data'];
 
            $temp = $rawquery->get();
 
            $rawQuery = $limit > 0 ? $rawquery->skip($start)->take($limit) : $rawquery;
 
            $data = $rawQuery->orderBy('updated_at', 'desc')->orderBy($order, $direction)->get();
 
            $totalFiltered = count($temp);
        } else {
         
            $data = $rawquery->orderby("updated_at", "desc")->take($limit)->get();
            $totalFiltered = $totalRecords;
        }

        $newData = [];
        $i = 0;

        foreach ($data as $d) {
            $user_details = user_details($d->emp_code);
   
            $newData[$i] = [
                'id'        => $d->id,
                'emp_code' => $d->emp_code,
                'emp_name' => $user_details['name'] ?? 'N/A',
                'department' => $user_details['department'] . '/'. $user_details['section'] ?? 'N/A',
                'action' => '<button class="btn btn-sm btn-secondary btn-view" data-id="' . $d->id . '"><i class="bi bi-bullseye"></i></button>'

            ];
            $i++;
        }
        // Return the response in JSON format
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFiltered,
            'data' => $newData
        ]);
    }
}
