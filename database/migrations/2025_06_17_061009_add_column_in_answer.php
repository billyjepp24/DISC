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
        Schema::table('google_form', function (Blueprint $table) {
            //
            $table->integer('emp_code')->after('id')->nullable();
            $table->integer('is_submit')->default(0)->after('emp_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('google_form', function (Blueprint $table) {
            //
        });
    }
};
