@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-full px-3 py-2 text-sm font-semibold text-slate-900 bg-white/80 ring-1 ring-slate-200/70 shadow-sm transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300/70'
            : 'inline-flex items-center rounded-full px-3 py-2 text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-white/70 ring-1 ring-transparent transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-300/70';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
