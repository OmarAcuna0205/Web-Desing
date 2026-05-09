<x-app-layout>
    <x-slot name="header">
        <h2 class="section-title">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="app-container">
            <div class="card p-8 fade-up">
                <div class="text-slate-700">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
