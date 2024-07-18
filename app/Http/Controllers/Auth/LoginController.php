<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'username'; // Use 'username' field instead of 'email'
    }

    protected function credentials(Request $request)
    {
        return [
            'username' => $request->username,
            'password' => $request->password,
            'active' => 1, // Ensure only active users can log in
        ];
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Attempt to find the user by their username
        $user = User::where('username', $request->username)->first();

        if ($user) {
            if (!$user->active) {
                Log::warning('User is inactive: ' . $user->username);
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
                ]);
            }
        } else {
            Log::error('User not found: ' . $request->username);
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }

        // Log the attempt to login
        Log::info('Attempting to login with credentials: ', $this->credentials($request));

        if ($this->attemptLogin($request)) {
            Log::info('Login successful for user: ' . $request->username);
            
            // Deactivate user if they logged in successfully but are inactive
            if (!$user->active) {
                $this->guard()->logout();
                $request->session()->invalidate();
                throw ValidationException::withMessages([
                    $this->username() => ['Your account is currently inactive. Please contact support.'],
                ]);
            }

            return $this->sendLoginResponse($request);
        }

        Log::error('Login failed for user: ' . $request->username);
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        // Additional logic after successful authentication if needed
    }

}
