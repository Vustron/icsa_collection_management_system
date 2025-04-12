<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CollectionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionCategoryController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles->every(fn($role) => $role["role_id"] == 1)) {
            $collection_categories = CollectionCategory::all();
        } else {
            $collection_categories = CollectionCategory::with("institute")
                ->where("institute_id", Auth::user()["institute_id"])
                ->get();
        }
        // dd($collection_categories);
        return view(
            "collection_categories.index",
            compact("collection_categories")
        );
    }

    public function create() {}

    public function store(Request $request)
    {
        $duplicate_check = CollectionCategory::where(
            "category_name",
            $request["category_name"]
        )
            ->where("institute_id", $request["institute_id"])
            ->exists();

        if ($duplicate_check) {
            return back()->with(
                "error",
                "Category name exist in the same institute"
            );
        }

        $validated = $request->validate([
            "category_name" => "required|string|max:255",
            "collection_fee" => "numeric",
            "description" => "nullable|string|max:500",
            "institute_id" => "exists:institutes,id",
        ]);
        CollectionCategory::create($validated);

        return redirect(route("collection_categories.index"))->with(
            "success",
            $request["category_name"] . " Category was added Successfully"
        );
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id)
    {
        // dd($request, $id);

        $duplicate_check = CollectionCategory::where(
            "category_name",
            $request["category_name"]
        )
            ->where("institute_id", $request["institute_id"])
            ->whereNot("id", $id)
            ->exists();

        if ($duplicate_check) {
            return back()->with(
                "error",
                "Category name exist in the same institute"
            );
        }

        // dd('sucess');

        $validated = $request->validate([
            "category_name" => "required",
            // "collection_fee" => "required",
            "description" => "required",
        ]);

        $category = CollectionCategory::find($id);

        $category->update($validated);

        return back()->with("success", "Successfully Updated Category");
    }

    public function destroy($id)
    {
        CollectionCategory::destroy($id);
        return redirect()
            ->back()
            ->with("deleted", "Category Deleted Successsfully");
    }
}
