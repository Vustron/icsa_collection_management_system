<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AttendanceFee;
use App\Models\Fees;
use App\Models\Payment;
use App\Models\PaymentSubmission;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentListController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles->every(fn($role) => $role["role_id"] == 1)) {
            $students = Student::all();
            $programs = Program::all();
        } else {
            $students = Student::whereHas("program.institute", function ($query) {
                $query->where("id", Auth::user()['institute_id']);
            })->get();
            $programs = Program::where('institute_id', Auth::user()['institute_id'])->get();
        }
        // dd($students);
        // dd($programs);
        return view("student_list.index", compact("students", "programs"));
    }

    public function create() {}

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'middle_name' => 'nullable',
                'email' => 'required|unique:students,email',
                'school_id' => 'required|unique:students,school_id',
                'rfid' => 'nullable|unique:students,rfid',
                'program_id' => 'required',
                'year' => 'required|in:1,2,3,4',
                'set' => 'required',
                'status' => 'required|in:active,inactive,graduated,leave',
            ]
        );

        Student::create($validated);

        return redirect()->back()->with('success', 'New Student Added');
    }

    public function edit($id)
    {
        // $student = Student::where('id', $id)->first();
        // return view('student_list.edit_student', compact('student'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'email' => [
                'required',
                Rule::unique('students', 'email')->ignore($id),
            ],
            'school_id' => [
                'required',
                Rule::unique('students', 'school_id')->ignore($id),
            ],
            'rfid' => [
                'nullable',
                Rule::unique('students', 'rfid')->ignore($id),
            ],
            'program_id' => 'required',
            'year' => 'required|in:1,2,3,4',
            'set' => 'required',
            'status' => 'required|in:active,inactive,graduated,leave',
        ]);

        Student::where('id', $id)->update($validated);

        return redirect()->back()->with('success', 'Edited Student Successfully');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect(route('student_list.index'))->with('success', 'Student Deleted Successfully');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        $fees = Fees::where('student_id', $student['id'])->get();

        $attendace_fees = AttendanceFee::whereHas('attendanceRecord', function ($query) use ($id) {
            $query->where('student_id', $id);
        })->get();

        $total_fees_balance = 0;

        foreach ($fees as $fee) {
            if ($fee['status'] == "pending") {
                $total_fees_balance += $fee['balance'];
            }
        }

        $programs = Program::where('institute_id', Auth::user()['institute_id'])->get();

        $payments = Payment::whereHas('fee', function ($query) use ($id) {
            $query->where('student_id', $id);
        })->get();

        $payment_submissions = PaymentSubmission::whereHas('fee', function ($query) use ($id) {
            $query->where('student_id', $id);
        })->get();

        // dd($payment_submissions);
        // dd($payments);
        // dd($attendace_fees);
        // dd($fees);
        // dd($student);
        return view('student_list.actions.view_student', compact('student', 'fees', 'attendace_fees', 'programs', 'payments', 'payment_submissions', 'total_fees_balance'));
    }

    public function show_fee($id, $fee_id)
    {
        $student = Student::findOrFail($id);

        $fee = Fees::findOrFail($fee_id);

        if ($fee['category']['category_name'] == "Attendance Fees") {
            $attendance_fees = AttendanceFee::where('fee_id', $fee['id'])->get();
            // dd($attendace_fees);
            // $attendace_fees[array]['attendanceRecord']['event']['event_name'];
            $groupedFees = $attendance_fees->groupBy(fn($fee) => $fee->attendanceRecord->event->event_name);
            // dd($groupedFees);
            return view('student_list.actions.view_student_attendance_fees', compact('student', 'groupedFees'));
        }

        return view('student_list.actions.view_student_fees', compact('student', 'fee'));
        // dd("Not Attendace");
    }

    public function show_payment($id, $payment_id)
    {
        $student = Student::findOrFail($id);

        $payment = Payment::findOrFail($payment_id);
        // dd($payment);
        return view('student_list.actions.view_student_payment', compact('student', 'payment'));
    }
    public function show_payment_submission($id, $payment_submission_id)
    {
        $student = Student::findOrFail($id);

        $payment_submission = PaymentSubmission::findOrFail($payment_submission_id);
        // dd($payment);
        return view('student_list.actions.view_student_payment_submission', compact('student', 'payment_submission'));
    }
}
