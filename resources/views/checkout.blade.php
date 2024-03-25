<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="p-6" action="" method="post">

                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="card" :value="__('Card Details')" />

                        <div id="card-element">

                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Pay') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script>
        const stripe = Stripe('{{ config('cashier.key') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('payment');
        cardElement.mount('#card-element');
    </script>

</x-app-layout>
