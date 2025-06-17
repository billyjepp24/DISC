<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleForm extends Model
{
    use HasFactory;

protected $table    = 'google_form';
   protected $fillable = ['answers'];

protected $casts = [
    'answers' => 'array',
];
}


