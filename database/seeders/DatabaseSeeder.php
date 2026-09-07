<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::query()->delete();

        $students = [
            ['student_id' => 'ID-2026-0001', 'first_name' => 'Amara', 'middle_name' => 'Grace', 'last_name' => 'Santos', 'email' => 'amara.santos@university.edu', 'mobile_number' => '09171234001', 'date_of_birth' => '2005-03-14', 'gender' => 'Female', 'program' => 'BS Information Technology', 'year_level' => '2nd Year', 'address' => '18 Mabini Street, Quezon City', 'profile_picture' => 'students/demo-01.svg'],
            ['student_id' => 'ID-2026-0002', 'first_name' => 'Liam', 'middle_name' => 'James', 'last_name' => 'Reyes', 'email' => 'liam.reyes@university.edu', 'mobile_number' => '09171234002', 'date_of_birth' => '2004-11-02', 'gender' => 'Male', 'program' => 'BS Computer Science', 'year_level' => '3rd Year', 'address' => '42 Rizal Avenue, Pasig City', 'profile_picture' => 'students/demo-02.svg'],
            ['student_id' => 'ID-2026-0003', 'first_name' => 'Sofia', 'middle_name' => 'Marie', 'last_name' => 'Navarro', 'email' => 'sofia.navarro@university.edu', 'mobile_number' => '09171234003', 'date_of_birth' => '2006-07-21', 'gender' => 'Female', 'program' => 'BS Information Systems', 'year_level' => '1st Year', 'address' => '7 Sampaguita Lane, Marikina City', 'profile_picture' => 'students/demo-03.svg'],
            ['student_id' => 'ID-2026-0004', 'first_name' => 'Ethan', 'middle_name' => 'Miguel', 'last_name' => 'Cruz', 'email' => 'ethan.cruz@university.edu', 'mobile_number' => '09171234004', 'date_of_birth' => '2003-12-09', 'gender' => 'Male', 'program' => 'BS Information Technology', 'year_level' => '4th Year', 'address' => '91 Bonifacio Drive, Manila', 'profile_picture' => 'students/demo-04.svg'],
            ['student_id' => 'ID-2026-0005', 'first_name' => 'Nia', 'middle_name' => 'Elise', 'last_name' => 'Villanueva', 'email' => 'nia.villanueva@university.edu', 'mobile_number' => '09171234005', 'date_of_birth' => '2005-09-30', 'gender' => 'Female', 'program' => 'BS Computer Science', 'year_level' => '2nd Year', 'address' => '25 Luna Street, Taguig City', 'profile_picture' => 'students/demo-05.svg'],
            ['student_id' => 'ID-2026-0006', 'first_name' => 'Noah', 'middle_name' => 'Daniel', 'last_name' => 'Bautista', 'email' => 'noah.bautista@university.edu', 'mobile_number' => '09171234006', 'date_of_birth' => '2004-05-18', 'gender' => 'Male', 'program' => 'BS Information Systems', 'year_level' => '3rd Year', 'address' => '63 Del Pilar Street, Caloocan City', 'profile_picture' => 'students/demo-06.svg'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }

        User::query()->updateOrCreate(['email' => 'test@example.com'], [
            'name' => 'Test User',
            'password' => Hash::make('password'),
        ]);
    }
}
