<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {

        return view('frontend.auth.register', ['active' => 'register', 'title' => 'Register']);
    }

    public function loginView()
    {
        return view('frontend.auth.login');
    }

    public function storeUser(Request $request)
    {
        try {
            if ($request->password != $request->confirm_password) {
                alert()->error('error', 'Password and Confirm Password do not match');
                return redirect()->back();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($user) {
                Auth::guard('user')->login($user);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            alert()->error('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function loginUser(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::guard('user')->attempt($credentials, $remember)) {
            Auth::guard('user')->login(Auth::guard('user')->user());
            return redirect()->intended(route('home'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'approve' => 'Wrong password or this account not approved yet.',
        ]);
    }

    public function checkAuth(Request $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Authenticated'], 200); // User is authenticated
        } else {
            return response()->json(['message' => 'Not Authenticated'], 401); // User is not authenticated
        }
    }
}
