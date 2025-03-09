<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentListController extends Controller
{
    public function index()
    {
        $students = Student::whereHas("program.institute", function ($query) {
            $query->where("id", 1);
        })->get();

        // dd($students);

        return view("student_list.index", compact("students"));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
