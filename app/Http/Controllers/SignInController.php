<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignInController extends Controller
{
    function index()
    {
        return view("index");
    }

    // e delete rani ha if mag work namo sa authentication or verification
    function verify(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::with(['institute', 'roles.roleName'])->where('email', $validated['email'])->first();

        if ($user) {

            $saltedPepperPassword = $validated['password'] . $user->salt . 'supersecretpepper';

            if (Hash::check($saltedPepperPassword, $user->password)) {
                $remember = $request->has('remember') ? true : false;

                // if (! $user->roles->map(function ($role) {
                //     return $role['system_id'] != 3;
                // })) {
                //     return back()->withErrors(['not_authorized' => 'Sorry Not Authorized'])->withInput();
                // }

                if ($user->roles->every(fn($role) => $role['system_id'] != null)) {
                    if ($user->roles->every(fn($role) => $role['system_id'] != 3)) {
                        return back()->withErrors(['not_authorized' => 'Sorry not Authorized'])->withInput();
                    }
                }

                Auth::login($user, $remember);
                $request->session()->regenerate();

                // Auth::user()->roles->map(function ($role) {
                //     return [
                //         'roleName' => $role->roleName,
                //         'role' => $role->role,
                //     ];
                // });

                return redirect()->route('dashboard.index');
            } else {
                return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
            }
        }

        return back()->withErrors(['email' => 'No account found with that email address.'])->withInput();
    }

    function forgot_password()
    {
        return view("auth.forgot_password");
    }

    function verify_email(Request $request)
    {
        return view("auth.account_recovery");
    }

    function verify_code(Request $request)
    {
        return view("auth.account_recovery", [
            "verified" => $request["code"] == 123456 ? true : false,
        ]);
    }

    public function change_password(Request $request)
    {
        if ($request["new_password"] == $request["confirm_new_password"]) {
            return view("auth.account_recovery", [
                "verified" => true,
                "password_matched" => true,
            ]);
        }

        return view("auth.account_recovery", [
            "verified" => true,
            "password_matched" => false,
        ]);
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route("signin"));
    }
}
