<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\AdminRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class AdminManagerController extends Controller
{
    public function index()
    {
        // $users = User::with('roles')->where(['institute_id' => Auth::user()['institute_id']])->get();

        if (Auth::user()->roles->every(fn($role) => $role["role_id"] == 1)) {
            $users = User::all();
        } else {
            $users = User::with("roles", "institute")
                ->where("institute_id", Auth::user()->institute_id)
                ->whereHas("roles", function ($query) {
                    $query->where("role_id", 3);
                })
                ->get();
        }

        // dd($users);
        return view("admin_manager.index", compact("users"));
    }

    // public function sign_up(){
    //     return view('auth.index');
    // }

    public function create() {}

    public function store(Request $request)
    {
        // DD($request);
        $validated = $request->validate([
            "user_name" => [
                "required",
                "string",
                "max:255",
                "unique:users,user_name",
            ],
            "email" => [
                "required",
                "string",
                "email",
                "max:255",
                "unique:users,email",
            ],
            "password" => [
                "required",
                "min:8",
                "confirmed",
                // 'regex:/[A-Z]/',
                // 'regex:/[a-z]/',
                // 'regex:/[0-9]/',
                // 'regex:/[\W_]/'
            ],
        ]);

        $salt = Str::random(16);
        $pepper = "supersecretpepper";
        $saltedPepperPassword = $validated["password"] . $salt . $pepper;

        $user = User::create([
            "user_name" => $validated["user_name"],
            "email" => $validated["email"],
            "password" => Hash::make($saltedPepperPassword),
            "salt" => $salt,
            "provider" => "email",
            "institute_id" => Auth::user()["institute_id"],
        ]);

        if (!$user) {
            throw new \Exception("Failed to create user");
        }

        AdminRole::create([
            "user_id" => $user->id,
            "role_id" => is_null(Auth::user()["institute_id"]) ? 1 : 3,
            "system_id" => 3,
        ]);

        return redirect(route("admin_manager.index"))->with([
            "success",
            "Account created successfully.",
        ]);
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()
            ->back()
            ->with("deleted", "Account Deleted Successsfully");
    }
}
