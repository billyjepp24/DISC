<?php

use App\Models\Question;

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
