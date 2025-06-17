<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoogleForm;
use Validator;
class GoogleFormController extends Controller
{
    //

    public function index()
    {
        return view('googleform'); // Your Blade file
    }


    public function store(Request $request)
    {
        // Validate that all 24 questions are answered with A-D
        $rules = [];
        foreach (range(1, 24) as $i) {
            $rules['question-' . $i] = 'required|in:A,B,C,D';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
           return response()->json(['errors'=>$validator->errors()]);
        }
     
        $answers = $request->only(array_map(fn($i) => 'question-' . $i, range(1, 24)));
    
        GoogleForm::create([
            'answers' => $answers,
        ]);


        return response()->json(['success' => 'Form submitted successfully!']);
        // return redirect()->back()->with('success', 'Form submitted successfully!');
    }

}
