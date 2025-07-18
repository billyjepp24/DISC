<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;
use Validator;
use App\Models\AnswersApp;
class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('applicants');
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Using Applicants model
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $applicant = Applicants::updateOrCreate(
            ['email' => $validated['email']],
            ['name' => $validated['name']]
        );

        // Using AnswersApp model
        $answers = $request->except(['name', 'email', '_token']);
        $answersRecord = AnswersApp::updateOrCreate(
    ['email' => $validated['email']],
    [
        'name' => $validated['name'],
        'answers' => json_encode($answers),
    
]);

        return response()->json([
            'success' => true,
            'applicant_id' => $applicant->id,
            'answers_id' => $answersRecord->id,
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function storeBasic(Request $request)
{

    $validated = $request->validate([
    //    'email' => 'required|email|max:255|unique:applicants,email',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Check if applicant exists by email
    $applicant = Applicants::where('email', $validated['email'])->first();

    if ($applicant) {
        // If applicant exists, update answers
       

        // Update name if changed
        $applicant->update(['name' => $validated['name']]);
    } else {
        // Create new applicant
        $applicant = Applicants::create($validated);
    }

    return response()->json([
        'success' => true,
        'applicant_id' => $applicant->id,
        'name' => $applicant->name,
        'email' => $applicant->email,
        'is_submit' => $applicant->is_submit,
        'answers' => $applicant->answers, // Return the answers if needed
    ]);
}

    
    public function autosave(Request $request){
        $email = $request->input('email');
        $question = $request->input('name'); // e.g., question-1
        $answer = $request->input('value');

        // Save or update the answer
        $submission = Applicants::firstOrCreate(
        ['email' => $email],
        ['name' => 'Unknown', 'answers' => []]
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

    
    public function fetchAnswers(Request $request)
{
    $email = $request->input('email');
    $applicant = Applicants::where('email', $email)->first();

    if ($applicant && $applicant->answers) {
        return response()->json([
            'success' => true,
            'answers' => $applicant->answers,
        ]);
    } else {
        return response()->json(['success' => false]);
    }
}




}
