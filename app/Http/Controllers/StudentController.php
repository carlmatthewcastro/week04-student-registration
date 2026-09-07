<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()->latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => ['required', 'string', 'max:50', 'unique:students,student_id'],
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'mobile_number' => ['required', 'numeric'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'program' => ['required', 'string', 'max:150'],
            'year_level' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:500'],
            'profile_picture' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'student_id.required' => 'A student ID is required.',
            'student_id.unique' => 'That student ID is already registered.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'That email address is already registered.',
            'mobile_number.numeric' => 'The mobile number must contain numbers only.',
            'profile_picture.required' => 'A profile picture is required.',
            'profile_picture.image' => 'The profile picture must be a valid image.',
            'profile_picture.mimes' => 'The profile picture must be a JPG or PNG file.',
            'profile_picture.max' => 'The profile picture may not be larger than 2 MB.',
        ]);

        $validatedData['first_name'] = str($validatedData['first_name'])->title()->toString();
        $validatedData['middle_name'] = filled($validatedData['middle_name'] ?? null)
            ? str($validatedData['middle_name'])->title()->toString()
            : null;
        $validatedData['last_name'] = str($validatedData['last_name'])->title()->toString();
        $validatedData['profile_picture'] = $request->file('profile_picture')
            ->store('students', 'public');

        $student = Student::create($validatedData);

        return redirect()->route('students.show', $student)
            ->with('success', 'Student registered successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        if ($student->profile_picture) {
            Storage::disk('public')->delete($student->profile_picture);
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student removed successfully.');
    }
}