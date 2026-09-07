@extends('layouts.app', ['title' => 'Register student'])

@section('content')
<div class="mx-auto max-w-5xl">
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
        <div><p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-indigo-600">New record</p><h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Register a student</h1><p class="mt-2 max-w-xl text-sm leading-6 text-slate-500">Create a complete student profile for the admissions directory. Required fields are marked with an asterisk.</p></div>
        <div class="rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-right shadow-sm"><p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Secure intake</p><p class="mt-1 text-sm font-semibold text-slate-700">Encrypted form submission</p></div>
    </div>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/40 sm:p-8">
            <div class="mb-6 flex items-start gap-4 border-b border-slate-100 pb-5"><span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-sm font-bold text-indigo-700">01</span><div><h2 class="text-lg font-bold text-slate-950">Personal information</h2><p class="mt-1 text-sm text-slate-500">Identity details used on the official student record.</p></div></div>
            <div class="grid gap-5 sm:grid-cols-3">
                @foreach ([['first_name', 'First name'], ['middle_name', 'Middle name'], ['last_name', 'Last name']] as [$name, $label])
                    <div><label for="{{ $name }}" class="mb-2 block text-sm font-semibold text-slate-700">{{ $label }}{{ $name !== 'middle_name' ? ' *' : '' }}</label><input id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" {{ $name !== 'middle_name' ? 'required' : '' }} class="w-full rounded-lg border {{ $errors->has($name) ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">@error($name)<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                @endforeach
                <div><label for="date_of_birth" class="mb-2 block text-sm font-semibold text-slate-700">Date of birth *</label><input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" required class="w-full rounded-lg border {{ $errors->has('date_of_birth') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">@error('date_of_birth')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                <div><label for="gender" class="mb-2 block text-sm font-semibold text-slate-700">Gender *</label><select id="gender" name="gender" required class="w-full rounded-lg border {{ $errors->has('gender') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"><option value="">Select gender</option>@foreach (['Male', 'Female', 'Other'] as $option)<option value="{{ $option }}" @selected(old('gender') === $option)>{{ $option }}</option>@endforeach</select>@error('gender')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/40 sm:p-8">
            <div class="mb-6 flex items-start gap-4 border-b border-slate-100 pb-5"><span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-sm font-bold text-indigo-700">02</span><div><h2 class="text-lg font-bold text-slate-950">Academic information</h2><p class="mt-1 text-sm text-slate-500">Enrollment identifiers and current academic placement.</p></div></div>
            <div class="grid gap-5 sm:grid-cols-3">
                <div><label for="student_id" class="mb-2 block text-sm font-semibold text-slate-700">Student ID *</label><input id="student_id" name="student_id" value="{{ old('student_id') }}" required placeholder="e.g. 2026-00124" class="w-full rounded-lg border {{ $errors->has('student_id') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">@error('student_id')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                <div><label for="program" class="mb-2 block text-sm font-semibold text-slate-700">Program *</label><select id="program" name="program" required class="w-full rounded-lg border {{ $errors->has('program') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"><option value="">Select program</option>@foreach (['BS Information Technology', 'BS Computer Science', 'BS Information Systems', 'BS Business Administration'] as $option)<option value="{{ $option }}" @selected(old('program') === $option)>{{ $option }}</option>@endforeach</select>@error('program')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                <div><label for="year_level" class="mb-2 block text-sm font-semibold text-slate-700">Year level *</label><select id="year_level" name="year_level" required class="w-full rounded-lg border {{ $errors->has('year_level') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"><option value="">Select year</option>@foreach (['1st Year', '2nd Year', '3rd Year', '4th Year'] as $option)<option value="{{ $option }}" @selected(old('year_level') === $option)>{{ $option }}</option>@endforeach</select>@error('year_level')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/40 sm:p-8">
            <div class="mb-6 flex items-start gap-4 border-b border-slate-100 pb-5"><span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-sm font-bold text-indigo-700">03</span><div><h2 class="text-lg font-bold text-slate-950">Contact & profile</h2><p class="mt-1 text-sm text-slate-500">Ways to reach the student and their directory photo.</p></div></div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div><label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email address *</label><input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="student@university.edu" class="w-full rounded-lg border {{ $errors->has('email') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">@error('email')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                <div><label for="mobile_number" class="mb-2 block text-sm font-semibold text-slate-700">Mobile number *</label><input id="mobile_number" name="mobile_number" type="tel" value="{{ old('mobile_number') }}" required inputmode="numeric" placeholder="09171234567" class="w-full rounded-lg border {{ $errors->has('mobile_number') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">@error('mobile_number')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                <div class="sm:col-span-2"><label for="address" class="mb-2 block text-sm font-semibold text-slate-700">Complete address *</label><textarea id="address" name="address" rows="3" required placeholder="House number, street, barangay, city" class="w-full resize-none rounded-lg border {{ $errors->has('address') ? 'border-rose-400' : 'border-slate-200' }} bg-slate-50 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10">{{ old('address') }}</textarea>@error('address')<p class="mt-1.5 text-xs font-medium text-rose-600">{{ $message }}</p>@enderror</div>
                <div class="sm:col-span-2"><label for="profile_picture" class="mb-2 block text-sm font-semibold text-slate-700">Profile picture * <span class="font-normal text-slate-400">JPG or PNG, max 2 MB</span></label><label id="drop-zone" for="profile_picture" class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-5 py-7 text-center transition hover:border-indigo-400 hover:bg-indigo-50/50"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-xl text-indigo-600">↑</span><span><span id="file-label" class="block text-sm font-bold text-slate-800">Drop your photo here or browse</span><span class="mt-1 block text-xs text-slate-500">Square JPG or PNG recommended</span></span><input id="profile_picture" name="profile_picture" type="file" accept="image/jpeg,image/png" required class="sr-only"><img id="image-preview" class="hidden h-20 w-20 rounded-lg object-cover ring-2 ring-white shadow-md" alt="Selected profile preview"></label>@error('profile_picture')<p class="field-error"><span aria-hidden="true">!</span>{{ $message }}</p>@enderror</div>
            </div>
        </section>
        <div class="flex flex-col-reverse items-center justify-between gap-4 sm:flex-row"><p class="text-xs text-slate-500">By submitting, you confirm the information is accurate.</p><button type="submit" class="w-full rounded-lg bg-indigo-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/25 transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/20 sm:w-auto">Complete registration <span aria-hidden="true">→</span></button></div>
    </form>
</div>
<script>
    const fileInput = document.getElementById('profile_picture');
    const dropZone = document.getElementById('drop-zone');
    const fileLabel = document.getElementById('file-label');
    fileInput.addEventListener('change', function (event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];
        if (!file) { preview.classList.add('hidden'); return; }
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        fileLabel.textContent = file.name;
        dropZone.classList.add('border-indigo-500', 'bg-indigo-50');
    });
    ['dragenter', 'dragover'].forEach((eventName) => dropZone.addEventListener(eventName, (event) => { event.preventDefault(); dropZone.classList.add('border-indigo-500', 'bg-indigo-50'); }));
    ['dragleave', 'drop'].forEach((eventName) => dropZone.addEventListener(eventName, (event) => { event.preventDefault(); if (eventName === 'dragleave') dropZone.classList.remove('border-indigo-500', 'bg-indigo-50'); }));
    dropZone.addEventListener('drop', (event) => { fileInput.files = event.dataTransfer.files; fileInput.dispatchEvent(new Event('change', { bubbles: true })); });
</script>
@endsection