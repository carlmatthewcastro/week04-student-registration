<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'student_id' => 'required|string|unique:students,student_id',
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'mobile_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'program' => 'required|string',
            'year_level' => 'required|string',
            'address' => 'required|string',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle File Upload to storage/app/public/profile-pictures
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $validatedData['profile_picture'] = $path;
        }

        $student = Student::create($validatedData);

        return redirect()->route('students.show', $student->id)
                         ->with('success', 'Student registered successfully!');
    }

    public function show(Student $student) {
        return view('students.show', compact('student'));
    }
}