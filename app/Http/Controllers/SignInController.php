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

    function logout()
    {
        return redirect(route("signin"));
    }
}
