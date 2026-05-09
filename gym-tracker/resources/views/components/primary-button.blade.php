<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-300/70']) }}>
    {{ $slot }}
</button>
