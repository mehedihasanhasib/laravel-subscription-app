<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- checkout form starts --}}
                <form id="form" class="p-6" action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="card" :value="__('Card Details')" />

                        <div id="card-element" class="mt-2 border h-9 rounded text-xl">

                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button id="submit-button" class="ms-4" data-secret="{{ $intent->client_secret }}">
                            {{ __('Pay') }}
                        </x-primary-button>
                    </div>
                </form>
                {{-- checkout form ends --}}
            </div>
        </div>
    </div>


    <script>
        // getting & mounting card element from stripe
        const stripe = Stripe('{{ config('cashier.key') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        // submitting form with setup intent
        const form = document.getElementById('form');
        const button = document.getElementById('submit-button');
        const name = document.getElementById('name');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            button.disabled = true;

            const setupIntent = await stripe.confirmCardSetup(
                button.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: name.value
                        }
                    }
                }
            )

            console.log(setupIntent);
        })
    </script>

</x-app-layout>
