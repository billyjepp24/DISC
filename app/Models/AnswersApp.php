<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswersApp extends Model
{
    use HasFactory;

    protected $table = 'answers_app'; //Ensure it matches your migration table

    protected $fillable = ['answers', 'email', 'name',]; //Allow mass assignment

    protected $casts = [
        'answers_app' => 'array', //Automatically cast to array
    ];
}
