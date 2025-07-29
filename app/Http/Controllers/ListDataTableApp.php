<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswersApp;

class ListDataTableApp extends Controller
{
    //
    public function index()
    {
        return view('datatable_app');
    }

    public function list(Request $request)
    {
        $keywords = $request->input('search.value', '');
        $limit = $request->input('length');

        $rawquery = AnswersApp::where(function ($query) use ($keywords) {
            $query->where('email', 'LIKE', "%$keywords%")
                ->orWhere('name', 'LIKE', "%$keywords%");
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
            // $user_details = user_details($d->emp_code);
            $user_details = [];
            if (!empty($d->emp_code)) {
                $user_details = user_details($d->emp_code);
            }

            $newData[$i] = [
                'id'        => $d->id,
                'email' => $d->email,
                'name' => $d->name ?? 'N/A',
                'answers' => $d->answers ?? 'N/A',
                'action' => '<button class="btn btn-sm btn-secondary btn-view" 
            data-id="' . $d->id . '"><i class="bi bi-bullseye"></i></button>'

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

    public function show(Request $request)
    {
        $id = $request->input('id');
        $data = AnswersApp::findOrFail($id);

        return response()->json([
            'id' => $data->id,
            'email' => $data->email,
            'name' => $data->name ?? 'N/A', // ✅ FIXED HERE
            'created_at' => date('Y-M-d', strtotime($data->created_at)),
            'answers' => $data->answers
        ]);
    }
}
