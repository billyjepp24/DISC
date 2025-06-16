<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoogleForm;

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
        foreach (range(1, 24) as $i) {
            $request->validate([
                'question-' . $i => 'required|in:A,B,C,D',
            ]);
        }

        $answers = $request->only(array_map(fn($i) => 'question-' . $i, range(1, 24)));
        dd($answers); // Debugging line to check the answers
        GoogleForm::create([
            'answers' => $answers,
        ]);

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

}
