<?php

use App\Models\Question;
use App\Models\Score;

if (!function_exists('questionBlocks')) {
    function questionBlocks()
    {
        $questions = Question::all();

        $output = '';

        foreach ($questions as $index => $q) {
            $qNumber = $index + 1;

            $output .= '
            <div class="question-container mb-4">
                <div class="form-group fs-4" >
                    <label class="form-label fs-4 mb-1" for="question-' . $qNumber . '">
                        Q' . $qNumber . '
                    </label>
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-check fs-5">
                                <input class="form-check-input" type="radio" id="q' . $qNumber . '-a" name="question-' . $qNumber . '" value="A">
                                <label class="form-check-label fs-5" for="q' . $qNumber . '-a">A. ' . htmlspecialchars($q->option_a) . '</label>
                            </div>
            
                            <div class="form-check fs-5">
                                <input class="form-check-input" type="radio" id="q' . $qNumber . '-b" name="question-' . $qNumber . '" value="B">
                                <label class="form-check-label fs-5" for="q' . $qNumber . '-b">B. ' . htmlspecialchars($q->option_b) . '</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check fs-5">
                                <input class="form-check-input" type="radio" id="q' . $qNumber . '-c" name="question-' . $qNumber . '" value="C">
                                <label class="form-check-label fs-5" for="q' . $qNumber . '-c">C. ' . htmlspecialchars($q->option_c) . '</label>
                            </div>

                            <div class="form-check fs-5">
                                <input class="form-check-input" type="radio" id="q' . $qNumber . '-d" name="question-' . $qNumber . '" value="D">
                                <label class="form-check-label fs-5" for="q' . $qNumber . '-d">D. ' . htmlspecialchars($q->option_d) . '</label>
                            </div>
                        </div>
                    </div>
                       <span class="error-span error-question-' . $qNumber . ' d-none text-danger"></span>
                </div>
            </div>';
        }

        return $output;
    }
}

if (!function_exists('scoreBlock')) {
    function scoreBlock()
    {
        $scores = Score::all();

        $output = '<table id="discTable" class="table table-bordered">';
        $output .= '<tbody>';

        foreach ($scores as $index => $row) {
            $number = $index + 1;
            $output .= '<tr>';
            $output .= '<td style="width: 30px;">' . $number . '</td>';
            $output .= '<td>' . htmlspecialchars($row->D) . '</td>';
            $output .= '<td>' . htmlspecialchars($row->I) . '</td>';
            $output .= '<td>' . htmlspecialchars($row->S) . '</td>';
            $output .= '<td>' . htmlspecialchars($row->C) . '</td>';
            $output .= '</tr>';
        }

        // Add Total row
        $output .= '<tr class="disc-row">';
        $output .= '<th class="no-border">Total</th>';
        $output .= '<th id="totalD"></th>';
        $output .= '<th id="totalI"></th>';
        $output .= '<th id="totalS"></th>';
        $output .= '<th id="totalC"></th>';
        $output .= '</tr>';

        // Add DISC labels row
        $output .= '<tr class="disc-row">';
        $output .= '<th class="no-border"></th>';
        $output .= '<th>D</th>';
        $output .= '<th>I</th>';
        $output .= '<th>S</th>';
        $output .= '<th>C</th>';
        $output .= '</tr>';

        $output .= '</tbody></table>';

        return $output;
    }
}



if (!function_exists("user_details")) {
    function user_details($emp_code)
    {
        if (empty($emp_code)) {
            return ''; // or return a default value
        }

        $employees   = collect(session('all_emp'));
        $departments = collect(session('all_department'));
        $sections    = collect(session('all_section'));
        $emp_details = $employees->firstWhere('emp_code', $emp_code);
        $emp_department = $departments->firstWhere('id', $emp_details['department_id'] ?? null);
        $emp_section = $sections->firstWhere('id', $emp_details['section_id'] ?? null);

        return [
            'name' => $emp_details ? $emp_details['first_name'] . ' ' . $emp_details['last_name'] : '',
            'department' => $emp_department ? $emp_department['name'] : '',
            'section' => $emp_section ? $emp_section['name'] : '',
        ];
    }
}

if (!function_exists("fetchdata_api")) {
    function fetchdata_api($endpoint, $payload)
    {
        $token = session('auth_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token, // Attach token
            'Accept' => 'application/json',
        ])->post(env('API_DATA') . '/' . $endpoint, $payload);

        return $response->successful() ? $response->json() : null;
    }
}