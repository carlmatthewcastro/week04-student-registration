@extends('layouts.app', ['title' => 'Home'])

@section('content')
<div class="mx-auto max-w-7xl space-y-16 pb-12">
    <section class="relative overflow-hidden rounded-[2rem] border border-indigo-100/80 bg-white/80 px-6 py-10 shadow-[0_30px_80px_rgba(79,70,229,0.08)] backdrop-blur-sm sm:px-10 lg:px-14 lg:py-16">
        <div class="absolute inset-y-0 right-0 hidden w-1/2 bg-[radial-gradient(circle_at_center,_rgba(129,140,248,0.18),_transparent_60%)] lg:block"></div>
        <div class="relative grid items-center gap-10 lg:grid-cols-[1.2fr_0.8fr]">
            <div>
                <span class="inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.18em] text-indigo-700">
                    <span class="h-2 w-2 rounded-full bg-indigo-500"></span>
                    Student Registry
                </span>
                <h1 class="mt-6 max-w-xl font-display text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    A modern way to register and manage student records.
                </h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-slate-600 sm:text-lg">
                    Capture student details, validate important information, store profile images securely, and keep your admissions directory organized in one place.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('students.create') }}" class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/25 transition hover:-translate-y-0.5 hover:bg-indigo-700">
                        Register student
                    </a>
                    <a href="{{ route('students.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 transition hover:border-indigo-200 hover:text-indigo-700">
                        View directory
                    </a>
                </div>
                <div class="mt-8 flex flex-wrap gap-6 text-sm text-slate-600">
                    <div>
                        <span class="block text-xl font-bold text-slate-950">120+</span>
                        <span>records supported</span>
                    </div>
                    <div>
                        <span class="block text-xl font-bold text-slate-950">99.9%</span>
                        <span>validation coverage</span>
                    </div>
                    <div>
                        <span class="block text-xl font-bold text-slate-950">24/7</span>
                        <span>access ready</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative rounded-[2rem] border border-slate-200 bg-slate-950 p-4 shadow-[0_20px_60px_rgba(15,23,42,0.28)]">
                    <div class="rounded-[1.5rem] bg-white p-4">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">Admissions board</p>
                                <h2 class="mt-1 text-lg font-bold text-slate-950">Student overview</h2>
                            </div>
                            <span class="rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-bold uppercase tracking-[0.14em] text-emerald-700">Live</span>
                        </div>

                        <div class="space-y-3">
                            @foreach([
                                ['Amara Santos', 'BSIT - 2nd Year', 'ID-2026-0001'],
                                ['Liam Reyes', 'BSCS - 3rd Year', 'ID-2026-0002'],
                                ['Sofia Navarro', 'BSIS - 1st Year', 'ID-2026-0003'],
                            ] as $student)
                                <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 p-3">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 font-display text-sm font-bold text-indigo-700">{{ strtoupper(substr($student[0], 0, 1)) }}</span>
                                        <div>
                                            <p class="text-sm font-bold text-slate-900">{{ $student[0] }}</p>
                                            <p class="text-xs text-slate-500">{{ $student[1] }}</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-slate-400">{{ $student[2] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-6 md:grid-cols-3">
        @php
            $features = [
                ['title' => 'Fast registration', 'description' => 'Collect complete student information with a clean and guided intake form.'],
                ['title' => 'Secure validation', 'description' => 'Verify required data, formats, and uploaded profile images before saving each record.'],
                ['title' => 'Organized directory', 'description' => 'Track and display all students in a simple and searchable academic workspace.'],
            ];
        @endphp

        @foreach ($features as $feature)
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-lg shadow-slate-200/40">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-lg text-indigo-700">✓</div>
                <h3 class="text-xl font-bold text-slate-950">{{ $feature['title'] }}</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $feature['description'] }}</p>
            </div>
        @endforeach
    </section>

    <section class="rounded-[2rem] border border-slate-200 bg-slate-950 px-6 py-10 text-white shadow-[0_25px_70px_rgba(15,23,42,0.22)] sm:px-10">
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-indigo-300">Ready to begin</p>
                <h2 class="mt-3 max-w-lg font-display text-3xl font-bold tracking-tight sm:text-4xl">
                    Start managing student information with confidence.
                </h2>
            </div>
            <a href="{{ route('students.create') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-slate-950 transition hover:bg-indigo-100">
                Add a student now
            </a>
        </div>
    </section>
</div>
@endsection
