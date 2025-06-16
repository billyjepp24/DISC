<?php

use App\Models\Question;

if (!function_exists('questionBlocks')) {
    function questionBlocks()
    {
        $questions = Question::all();
        $output = '';

        foreach ($questions as $index => $q) {
            $qNumber = $index + 1;

            $output .= '<div class="question-container">
                <div class="form-group">
                    <label for="question-' . $qNumber . '">Q' . $qNumber . '</label>
                    <div class="radio-group">
                        <input type="radio" id="q' . $qNumber . '-a" name="question-' . $qNumber . '" value="A">
                        <label for="q' . $qNumber . '-a">A. ' . htmlspecialchars($q->option_a) . '</label><br>

                        <input type="radio" id="q' . $qNumber . '-b" name="question-' . $qNumber . '" value="B">
                        <label for="q' . $qNumber . '-b">B. ' . htmlspecialchars($q->option_b) . '</label><br>

                        <input type="radio" id="q' . $qNumber . '-c" name="question-' . $qNumber . '" value="C">
                        <label for="q' . $qNumber . '-c">C. ' . htmlspecialchars($q->option_c) . '</label><br>

                        <input type="radio" id="q' . $qNumber . '-d" name="question-' . $qNumber . '" value="D">
                        <label for="q' . $qNumber . '-d">D. ' . htmlspecialchars($q->option_d) . '</label>
                    </div>
                </div>
            </div>';
        }

        return $output;
    }
}