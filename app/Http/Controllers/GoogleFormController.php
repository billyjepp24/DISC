<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

        $emp_code = $request->input('emp_code_form');
   
        if ($validator->fails()) {
           return response()->json(['errors'=>$validator->errors()]);
        }
     
        $answers = $request->only(array_map(fn($i) => 'question-' . $i, range(1, 24)));
        $googleForm = GoogleForm::where('emp_code', $emp_code)->first();
        $googleForm->update([
            'answers' => $answers,
            'emp_code' => $emp_code,
            'is_submit' => 1,
            'created_at' => now(),
        ]);


    return response()->json(['success' => 'Form submitted successfully!']);
}

    public function form_login(Request $request){
        $result = '';
        $emp_code = request('emp_code');
        $password = request('password');
        $answers = '';
        $credentials = [
            'emp_code' => $emp_code,
            'password' => $password,
        ];

        $response = Http::post(env('API_DATA') . '/' . 'login_api', $credentials);

        if ($response->successful()) {
            $userData = $response->json();
            $result = $userData['result'];

            $answer = GoogleForm::where('emp_code', $emp_code)->first();
            $is_submit = $answer ? $answer->is_submit : 0;
            $answers = $answer ? $answer->answers : [];
            
        }
    
        return response()->json(['result' => $result, 'emp_code' => $emp_code, 'answers' => $answers, 'is_submit' => $is_submit]);
    }

    public function autosave(Request $request){
        $empCode = $request->input('emp_code');
        $question = $request->input('name'); // e.g., question-1
        $answer = $request->input('value');

        // Save or update the answer
        $submission = GoogleForm::firstOrCreate(
        ['emp_code' => $empCode],
        ['answers' => []]
        );

        $answers = $submission->answers ?? [];
        $answers[$question] = $answer;
        $submission->answers = $answers;
        $submission->save();

        return response()->json([
        'success' => true,
        'answers' => $submission->answers,
        ]);
    }

}
