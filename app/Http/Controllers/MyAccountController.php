<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MyAccountController extends Controller
{
    public function index()
    {
        $roles = AdminRole::where("user_id", Auth::user()["id"])->get();
        // dd($roles);

        return view("my_account.index", compact("roles"));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        // dd($request);
        $validated = $request->validate([
            "profile_photo" => "nullable",
            "user_name" => "required|string|max:255" . $id,
            "email" =>
            "required|email|max:255|unique:users,email," .
                Auth::user()["id"],
            "status" => "required|string",
            "password" => "nullable|string|min:8|confirmed",
        ]);

        if (!$request->filled("profile_photo")) {
            unset($validated["profile_photo"]);
        }

        if ($request->hasFile("profile_photo")) {
            // $customFolder = 'profiles';

            // if ($user->profile_photo) {
            //     Storage::delete($user->profile_photo);
            // }

            // $path = $request->file('profile_photo')->storeAs($customFolder, $filename, 'public');
            // $validated['profile_photo'] = $path;

            $customFolder = public_path("images/profiles");

            if (!file_exists($customFolder)) {
                mkdir($customFolder, 0777, true);
            }

            if ($user->profile_photo) {
                $oldFile = public_path(
                    "images/profiles/" . $user->profile_photo
                );
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            $originalName = $request
                ->file("profile_photo")
                ->getClientOriginalName();
            // $extension = '.' . $request->file('profile_photo')->getClientOriginalExtension();

            $filename = $user["user_name"] . "_" . time() . "_" . $originalName;

            $request->file("profile_photo")->move($customFolder, $filename);

            $validated["profile_photo"] = $filename;
        }

        if (!$request->filled("password")) {
            unset($validated["password"]);
        } else {
            $validated["password"] = Hash::make(
                $request->password . $user["salt"] . "supersecretpepper"
            );
        }

        // dd($validated);

        User::where("id", $user["id"])->update($validated);

        return back()->with(
            "success",
            "The account has been successfully updated."
        );
    }

    public function destroy($id) {}
}
