<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
      
        'googleform/store', '/googleform/login', '/datatable/list', 'googleform/autosave', '/datatable/answers', 'googleform-app/store' ,
        'googleform-app/autosave', '/googleform-app/store', '/applicants/store-basic', '/applicants/store' 
    ];
}
