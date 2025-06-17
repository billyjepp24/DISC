<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code');
            $table->longText('answers')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
            $table->string('deleted_by', 10)->nullable();
            // $table->string('q1');
            // $table->string('q2');
            // $table->string('q3');
            // $table->string('q4');
            // $table->string('q5');
            // $table->string('q6');
            // $table->string('q7');
            // $table->string('q8');
            // $table->string('q9');
            // $table->string('q10');
            // $table->string('q11');
            // $table->string('q12');
            // $table->string('q13');
            // $table->string('q14');
            // $table->string('q15');
            // $table->string('q16');
            // $table->string('q17');
            // $table->string('q18');
            // $table->string('q19');
            // $table->string('q20');
            // $table->string('q21');
            // $table->string('q22');
            // $table->string('q23');
            // $table->string('q24');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
