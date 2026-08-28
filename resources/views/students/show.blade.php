<!-- resources/views/students/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Preview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-tr from-slate-100 via-blue-50/40 to-indigo-50/50 min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="max-w-2xl w-full bg-white/80 backdrop-blur-xl shadow-2xl shadow-indigo-100/50 rounded-3xl border border-white overflow-hidden p-8 sm:p-10">
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center shadow-sm">
                <svg class="w-5 h-5 text-emerald-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="text-center mb-8">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600 mb-2 tracking-wide uppercase">
                Verified Profile
            </span>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Student Details</h2>
        </div>

        <div class="flex flex-col items-center mb-8 text-center">
            <div class="relative">
                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture" class="w-36 h-36 rounded-2xl object-cover ring-4 ring-indigo-500/20 shadow-xl">
                <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-500 border-2 border-white rounded-full"></span>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mt-4">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h3>
            <span class="inline-flex items-center px-3 py-1 mt-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                {{ $student->student_id }}
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-slate-50/70 p-6 rounded-2xl border border-slate-100 text-sm">
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</span>
                <span class="font-semibold text-slate-800 mt-0.5 block break-all">{{ $student->email }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Mobile Number</span>
                <span class="font-semibold text-slate-800 mt-0.5 block">{{ $student->mobile_number }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Date of Birth</span>
                <span class="font-semibold text-slate-800 mt-0.5 block">{{ $student->date_of_birth }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Gender</span>
                <span class="font-semibold text-slate-800 mt-0.5 block">{{ $student->gender }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Program</span>
                <span class="font-semibold text-slate-800 mt-0.5 block">{{ $student->program }}</span>
            </div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Year Level</span>
                <span class="font-semibold text-slate-800 mt-0.5 block">{{ $student->year_level }}</span>
            </div>
            <div class="sm:col-span-2 pt-3 border-t border-slate-200/60">
                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Address</span>
                <span class="font-semibold text-slate-800 mt-0.5 block">{{ $student->address }}</span>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('students.create') }}" class="inline-flex items-center justify-center px-5 py-3 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-xl transition duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Register Another Student
            </a>
        </div>
    </div>
</body>
</html>