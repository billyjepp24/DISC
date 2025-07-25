<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

        public function username()
    {
        $login = request()->input('emp_code');

        $fieldType = 'emp_code';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }


    protected function authenticated(Request $request, $user)
    {
        // All Employee
        $this->fetch_api_data('all_emp', 'emp_details');
        $this->fetch_api_data('all_department', 'department');
        $this->fetch_api_data('all_section', 'section');

    }

    private function fetch_api_data($sessionKey, $model){
        if(!Session::has($sessionKey)){
            $payload = [
                'model' => $model,
            ];
            $api_data = fetchdata_api('api_data', $payload);
            Session::put($sessionKey, $api_data);
        }
        else{
            $api_data = Session::get($sessionKey);
        }

        return $api_data;
    }


}
