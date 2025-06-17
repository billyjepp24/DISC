<?php
namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

use App\Models\RegisteredUser;
class loginApiProvider implements UserProvider
{

    public function retrieveById($identifier)
    {
   
        if (session()->has('user_data_'.$identifier)) {
            return new \App\Models\User(session('user_data_'.$identifier));
        }

        $payload = [
            'model' => 'emp_details',
            'filter' => [
                'id' => $identifier
            ]
        ];
        $token = session('auth_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token, // Attach token
            'Accept' => 'application/json',
        ])->post(env('API_DATA') . '/' . 'api_data', $payload);

        if ($response->successful()) {
            $userData = $response->json();
         
                // Create a user instance without saving to the database
                if (is_array($userData) && count($userData) > 0) {
                    // Extract the first element from the user data array
                    session(['user_data_'.$identifier => $userData[0]]);
                    $user = new \App\Models\User($userData[0]);
                  
                    return $user;
                }
            
        }
       
    }

    public function retrieveByToken($identifier, $token)
    {
        // Not implemented
    }

    public function updateRememberToken(\Illuminate\Contracts\Auth\Authenticatable $user, $token)
    {
        // Not implemented
    }

    public function retrieveByCredentials(array $credentials)
    {

        $userInRegister = RegisteredUser::where('emp_code', $credentials['emp_code'])->first();

        if (!$userInRegister) {
            return null;  // User not registered, return null to prevent login
        }

        $credentials['app_name'] = env('APP_NAME', 'default');
        $response = Http::post(env('API_DATA') . '/' . 'login_api', $credentials);

        if ($response->successful()) {
            $userData = $response->json();
          
            if ($userData['result'] == 200) {
                // Create a user instance without saving to the database
                $user = new \App\Models\User($userData['user_info']);
                session(['auth_token' => $userData['token']]);// Save the authentication token
                return $user;
            }
        }

        return null;
    }

    public function validateCredentials(\Illuminate\Contracts\Auth\Authenticatable $user, array $credentials)
    {
       
 
        return password_verify($credentials['password'], $user->getAuthPassword());
    }
}