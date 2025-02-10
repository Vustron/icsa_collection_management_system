<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    function index()
    {
        return view("index");
    }

    // e delete rani ha if mag work namo sa authentication or verification
    function verify(Request $request)
    {
        return redirect(route("dashboard.index"));
    }

    function forgot_password()
    {
        return view('auth.forgot_password');
    }

    function verify_email(Request $request)
    {
        return view('auth.account_recovery');
    }

    function verify_code(Request $request)
    {
        return view('auth.account_recovery', ['verified' => $request['code'] == 123456 ? true : false]);
    }

    public function  change_password(Request $request)
    {
        if ($request['new_password'] == $request['confirm_new_password']) {
            return view('auth.account_recovery', ['verified' => true, 'password_matched' => true]);
        }

        return view('auth.account_recovery', ['verified' => true, 'password_matched' => false]);
    }
    function logout()
    {
        return redirect(route("signin"));
    }
}
