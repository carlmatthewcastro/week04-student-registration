@extends('layouts.app', ['title' => 'Student directory'])

@section('content')
<div class="mx-auto max-w-6xl">
    <div class="mb-8 flex flex-col justify-between gap-5 lg:flex-row lg:items-end">
        <div>
            <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-indigo-100 bg-indigo-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.16em] text-indigo-700"><span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>Records overview</div>
            <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">Student directory</h1>
            <p class="mt-2 max-w-xl text-sm leading-6 text-slate-500">A single, organized view of every student profile registered in the admissions workspace.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="rounded-xl border border-slate-200 bg-white px-5 py-3 shadow-sm"><p class="text-[11px] font-bold uppercase tracking-[0.14em] text-slate-400">Total records</p><p class="mt-1 font-display text-2xl font-bold text-slate-950">{{ $students->total() }}</p></div>
            <a href="{{ route('students.create') }}" class="hidden rounded-xl bg-slate-950 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-slate-950/15 transition hover:-translate-y-0.5 hover:bg-indigo-700 sm:inline-flex">Register student <span class="ml-2 text-indigo-300">→</span></a>
        </div>
    </div>

    <div id="directory-loading" class="space-y-3 rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/50" aria-label="Loading student directory">
        <div class="skeleton h-5 w-48"></div><div class="skeleton h-12 w-full"></div><div class="skeleton h-12 w-full"></div><div class="skeleton h-12 w-full"></div>
    </div>
    <div id="directory-content" class="hidden overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/50">
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4 sm:px-6"><div><h2 class="font-display text-base font-bold text-slate-950">Registered students</h2><p class="mt-0.5 text-xs text-slate-500">Most recently added profiles appear first.</p></div><span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">Live directory</span></div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] text-left">
                <caption class="sr-only">Registered students and profile actions</caption>
                <thead class="border-b border-slate-200 bg-slate-50/80 text-[11px] uppercase tracking-[0.14em] text-slate-500"><tr><th scope="col" class="px-6 py-4 font-bold">Student</th><th scope="col" class="px-6 py-4 font-bold">Academic placement</th><th scope="col" class="px-6 py-4 font-bold">Contact</th><th scope="col" class="px-6 py-4 text-right font-bold">Action</th></tr></thead>
                <tbody class="divide-y divide-slate-100">
                @forelse ($students as $student)
                    <tr class="group transition hover:bg-indigo-50/35">
                        <td class="px-6 py-4"><div class="flex items-center gap-3.5"><div class="relative h-11 w-11 shrink-0 overflow-hidden rounded-xl bg-indigo-100"><span class="absolute inset-0 flex items-center justify-center font-display text-sm font-bold text-indigo-700">{{ $student->initials }}</span><img src="{{ asset('storage/' . $student->profile_picture) }}" alt="" class="relative h-full w-full object-cover" onerror="this.remove()"></div><div><p class="font-bold text-slate-900">{{ $student->first_name }} {{ $student->last_name }}</p><p class="mt-1 text-xs font-medium text-slate-500">ID · {{ $student->student_id }}</p></div></div></td>
                        <td class="px-6 py-4"><span class="inline-flex max-w-[230px] rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">{{ $student->program }}</span><p class="mt-2 text-xs font-medium text-slate-500">{{ $student->year_level }}</p></td>
                        <td class="px-6 py-4"><p class="text-sm font-medium text-slate-700">{{ $student->email }}</p><p class="mt-1 text-xs text-slate-500">{{ $student->mobile_number }}</p></td>
                        <td class="px-6 py-4 text-right"><div class="inline-flex items-center gap-2"><a href="{{ route('students.show', $student) }}" class="inline-flex items-center rounded-lg border border-slate-200 px-3 py-2 text-xs font-bold text-slate-700 transition group-hover:border-indigo-200 group-hover:bg-white group-hover:text-indigo-700">View profile <span class="ml-1.5 text-indigo-500" aria-hidden="true">→</span></a><form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Remove this student from the directory?');">@csrf @method('DELETE')<button type="submit" class="inline-flex items-center rounded-lg border border-rose-200 px-3 py-2 text-xs font-bold text-rose-600 transition hover:border-rose-300 hover:bg-rose-50" aria-label="Remove {{ $student->first_name }} {{ $student->last_name }}">Delete</button></form></div></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-16 text-center"><div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-xl text-indigo-600">+</div><p class="mt-4 font-bold text-slate-800">No students registered yet</p><p class="mt-1 text-sm text-slate-500">Start by creating the first student profile.</p><a href="{{ route('students.create') }}" class="mt-5 inline-flex rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-bold text-white">Add first student</a></td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if ($students->hasPages())<div class="border-t border-slate-100 px-6 py-4">{{ $students->links() }}</div>@endif
    </div>
</div>
<script>
    window.addEventListener('load', () => {
        window.setTimeout(() => {
            document.getElementById('directory-loading')?.remove();
            document.getElementById('directory-content')?.classList.remove('hidden');
        }, 250);
    });
</script>
@endsection