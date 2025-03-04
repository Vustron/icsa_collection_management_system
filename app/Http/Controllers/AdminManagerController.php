<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\AdminRole;
use App\Models\System;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class AdminManagerController extends Controller
{
    public function index()
    {
        // $users = User::with('roles')->where(['institute_id' => Auth::user()['institute_id']])->get();

        if (Auth::user()->roles->every(fn($role) => $role['role_id'] == 1)) {
            $users = User::all();
        } else {
            $users = User::with('roles', 'institute')->where('institute_id', Auth::user()->institute_id)
                ->whereHas('roles', function ($query) {
                    $query->where('role_id', 3);
                })->get();
        }

        $systems = System::all();
        $roles = Role::all();

        // dd($systems, $roles);
        // dd($users);
        // dd($users[0]['roles']);
        return view("admin_manager.index", compact('users', 'systems', 'roles'));
    }

    // public function sign_up(){
    //     return view('auth.index');
    // }

    public function create() {}

    public function store(Request $request)
    {
        // DD($request);
        $validated = $request->validate([
            "user_name" => ["required", "string", "max:255", "unique:users,user_name"],
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
            "password" => Hash::make(
                $saltedPepperPassword
            ),
            "salt" => $salt,
            "provider" => "email",
            'institute_id' => Auth::user()['institute_id'],
        ]);

        if (!$user) {
            throw new \Exception("Failed to create user");
        }

        AdminRole::create([
            'user_id' => $user->id,
            'role_id' => is_null(Auth::user()['institute_id']) ? 1 : 3,
            'system_id' => 3,
        ]);

        return redirect(route('admin_manager.index'))->with(
            "success",
            "Account created successfully."
        );
    }

    public function new_admin_role(Request $request)
    {
        // dd($request);
        // $check_duplicate = AdminRole::where("", "");
        $validate = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:admin_roles,id',
            'system_id' => 'required|exists:systems,id',
            // 'user_id' => Rule::unique('admin_roles')->where(function ($query) use ($request) {
            //     return $query->where('role_id', $request->role_id)
            //         ->where('system_id', $request->system_id);
            // }),
        ]);

        $duplicate_check = AdminRole::where('user_id', $request['user_id'])
            ->where('role_id', $request['role_id'])
            ->where('system_id', $request['system_id'])
            ->exists();

        if ($duplicate_check) {
            return back()->with('error', 'Role assigned to admin already exist.');
        }

        AdminRole::create($validate);

        return redirect(route('admin_manager.index'))->with(
            "success",
            "New admin role added to " . $request['user_name'] . " successfully."
        );;
    }

    public function update_admin_details(Request $request)
    {
        dd($request);
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('deleted', 'Account Deleted Successsfully');
    }
}
