<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-300/70 disabled:opacity-60']) }}>
    {{ $slot }}
</button>
