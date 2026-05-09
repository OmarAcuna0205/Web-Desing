<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger focus:outline-none focus-visible:ring-2 focus-visible:ring-rose-300/70']) }}>
    {{ $slot }}
</button>
