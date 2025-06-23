<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleForm extends Model
{
    use HasFactory;

protected $table    = 'google_form';
   protected $fillable = ['answers' ,'emp_code', 'is_submit', 'created_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

protected $casts = [
    'answers' => 'array',
];
}


