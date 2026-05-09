@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-2 rounded-lg text-start text-base font-semibold text-slate-900 bg-white/80 ring-1 ring-slate-200/70 shadow-sm transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300/70'
            : 'block w-full px-4 py-2 rounded-lg text-start text-base font-semibold text-slate-600 hover:text-slate-900 hover:bg-white/70 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300/70';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
