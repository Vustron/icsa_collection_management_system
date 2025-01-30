<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class SignUpController extends Controller
{
    public function index()
    {
        return view("auth.index");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "user_name" => ["required", "string", "max:255", "unique:users"],
            "email" => [
                "required",
                "string",
                "email",
                "max:255",
                "unique:users",
            ],
            "password" => ["required", "confirmed"],
        ]);

        try {
            $salt = Str::random(16);
            $pepper = "supersecretpepper";
            $saltedPepperPassword = $validated["password"] . $salt . $pepper;

            $user = User::create([
                "user_name" => $validated["user_name"],
                "email" => $validated["email"],
                "password" => Hash::make(
                    $validated["password"] . $salt . $pepper
                ),
                "salt" => $salt,
                "role" => "user",
                "provider" => "emailPassword",
            ]);

            if (!$user) {
                throw new \Exception("Failed to create user");
            }

            return redirect()
                ->route("signup")
                ->with(
                    "success",
                    "Account created successfully. Please sign in."
                );
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    "error" => "Failed to create account. Please try again.",
                ]);
        }
    }
}
