<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $questions = [
            ['option_a' => 'Restrained',        'option_b' => 'Forceful',       'option_c' => 'Careful',        'option_d' => 'Expressive'],
            ['option_a' => 'Pioneering',        'option_b' => 'Correct',        'option_c' => 'Exciting',       'option_d' => 'Satisfied'],
            ['option_a' => 'Willing',           'option_b' => 'Animated',       'option_c' => 'Bold',           'option_d' => 'Precise'],
            ['option_a' => 'Argumentative',     'option_b' => 'Doubting',       'option_c' => 'Indecisive',     'option_d' => 'Unpredictable'],
            ['option_a' => 'Respectful',        'option_b' => 'Outgoing',       'option_c' => 'Patient',        'option_d' => 'Daring'],
            ['option_a' => 'Persuasive',        'option_b' => 'Self-reliant',   'option_c' => 'Logical',        'option_d' => 'Gentle'],
            ['option_a' => 'Cautious',          'option_b' => 'Even-tempered',  'option_c' => 'Decisive',       'option_d' => 'Life of the party'],
            ['option_a' => 'Popular',           'option_b' => 'Assertive',      'option_c' => 'Perfectionist',  'option_d' => 'Generous'],
            ['option_a' => 'Colorful',          'option_b' => 'Modest',         'option_c' => 'Easy going',     'option_d' => 'Unyielding'],
            ['option_a' => 'Systematic',        'option_b' => 'Optimistic',     'option_c' => 'Persistent',     'option_d' => 'Accommodating'],
            ['option_a' => 'Relentless',        'option_b' => 'Humble',         'option_c' => 'Neighborly',     'option_d' => 'Talkative'],
            ['option_a' => 'Friendly',          'option_b' => 'Observant',      'option_c' => 'Playful',        'option_d' => 'Strong-willed'],
            ['option_a' => 'Charming',          'option_b' => 'Adventurous',    'option_c' => 'Disciplined',    'option_d' => 'Deliberate'],
            ['option_a' => 'Restrained',        'option_b' => 'Steady',         'option_c' => 'Aggressive',     'option_d' => 'Attractive'],
            ['option_a' => 'Enthusiastic',      'option_b' => 'Analytical',     'option_c' => 'Sympathetic',    'option_d' => 'Determined'],
            ['option_a' => 'Commanding',        'option_b' => 'Impulsive',      'option_c' => 'Slow-paced',     'option_d' => 'Critical'],
            ['option_a' => 'Consistent',        'option_b' => 'Forceful',       'option_c' => 'Lively',         'option_d' => 'Laid-back'],
            ['option_a' => 'Influential',       'option_b' => 'Kind',           'option_c' => 'Independent',    'option_d' => 'Orderly'],
            ['option_a' => 'Idealistic',        'option_b' => 'Popular',        'option_c' => 'Pleasant',       'option_d' => 'Outspoken'],
            ['option_a' => 'Impatient',         'option_b' => 'Serious',        'option_c' => 'Procrastinator', 'option_d' => 'Emotional'],
            ['option_a' => 'Competing',         'option_b' => 'Spontaneous',    'option_c' => 'Loyal',          'option_d' => 'Thoughtful'],
            ['option_a' => 'Self-sacrificing', 'option_b' => 'Considerate',     'option_c' => 'Convincing',     'option_d' => 'Courageous'],
            ['option_a' => 'Dependent',         'option_b' => 'Inconsistent',   'option_c' => 'Submissive',     'option_d' => 'Pushy'],
            ['option_a' => 'Tolerant',          'option_b' => 'Conventional',   'option_c' => 'Stimulating',    'option_d' => 'Directing'],

        ];
         DB::table('questions')->insert($questions);
    }
}
