<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($plans as $plan)
                    <div class="p-3 text-gray-900">
                        <a class="text-blue-500 hover:text-blue-900"
                            href="{{ route('checkout', ['plan' => $plan->slug]) }}">{{ $plan->title }}</a>
                        {{-- <a class="text-blue-500 hover:text-blue-900"
                            href="https://buy.stripe.com/test_bIY4i0cDAe63bbGfYY">{{ $plan->title }}</a> --}}
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
