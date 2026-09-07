<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Student Registry' }} | {{ config('app.name', 'Student Registry') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/85 shadow-[0_1px_0_rgba(15,23,42,0.03)] backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3.5 sm:px-8">
            <a href="{{ route('students.create') }}" class="group flex items-center gap-3" aria-label="Student Registry home">
                <span class="brand-mark flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/25 transition group-hover:-rotate-3 group-hover:bg-indigo-700">
                    <svg class="h-7 w-7" viewBox="0 0 32 32" fill="none" aria-hidden="true">
                        <path d="M16 4 27 9.5 16 15 5 9.5 16 4Z" fill="currentColor" opacity=".95"/>
                        <path d="m9 12v7.5c0 2.5 3.13 4.5 7 4.5s7-2 7-4.5V12M27 10v9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="27" cy="22" r="3" fill="#818CF8" stroke="white" stroke-width="1.5"/>
                    </svg>
                </span>
                <span>
                    <span class="block font-display text-[15px] font-bold tracking-tight text-slate-950">Student Registry</span>
                    <span class="block text-xs text-slate-500">Admissions workspace</span>
                </span>
            </a>
            <nav class="flex items-center gap-2 text-sm font-semibold">
                <a href="{{ route('/') }}" class="rounded-lg px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700">Home</a>
                <a href="{{ route('students.index') }}" class="rounded-lg px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700">Directory</a>
                <a href="{{ route('students.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2.5 text-white shadow-md shadow-indigo-600/20 transition hover:-translate-y-0.5 hover:bg-indigo-700">+ <span class="hidden sm:inline">Add student</span><span class="sm:hidden">Add</span></a>
            </nav>
        </div>
    </header>

    @if (session('success') || session('error') || $errors->any())
        <div class="fixed right-4 top-20 z-50 w-[calc(100%-2rem)] max-w-sm space-y-3 sm:right-6" aria-live="polite">
            @if (session('success'))
                <div class="toast flex items-start gap-3 rounded-2xl border border-emerald-200 bg-white p-4 text-sm text-slate-700 shadow-2xl shadow-slate-900/10" role="status">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-700">✓</span><div class="flex-1"><p class="font-bold text-slate-950">Directory updated</p><p class="mt-0.5">{{ session('success') }}</p></div><button type="button" class="toast-close rounded-md p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-700" aria-label="Dismiss notification">×</button>
                </div>
            @endif
            @if (session('error'))
                <div class="toast flex items-start gap-3 rounded-2xl border border-rose-200 bg-white p-4 text-sm text-slate-700 shadow-2xl shadow-slate-900/10" role="alert">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-rose-100 font-bold text-rose-700">!</span><div class="flex-1"><p class="font-bold text-slate-950">Action could not be completed</p><p class="mt-0.5">{{ session('error') }}</p></div><button type="button" class="toast-close rounded-md p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-700" aria-label="Dismiss notification">×</button>
                </div>
            @endif
            @if ($errors->any())
                <div class="toast flex items-start gap-3 rounded-2xl border border-rose-200 bg-white p-4 text-sm text-slate-700 shadow-2xl shadow-slate-900/10" role="alert">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-rose-100 font-bold text-rose-700">!</span><div class="flex-1"><p class="font-bold text-slate-950">Check your details</p><p class="mt-0.5">{{ $errors->count() }} {{ Str::plural('field needs', $errors->count()) }} attention.</p></div><button type="button" class="toast-close rounded-md p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-700" aria-label="Dismiss notification">×</button>
                </div>
            @endif
        </div>
    @endif

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 sm:py-12">
        @yield('content')
    </main>
    <script>
        document.querySelectorAll('.toast').forEach((toast) => {
            const close = () => toast.remove();
            toast.querySelector('.toast-close')?.addEventListener('click', close);
            window.setTimeout(close, 6000);
        });
    </script>
</body>
</html>