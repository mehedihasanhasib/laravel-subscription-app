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

    const {
        setupIntent,
        error
    } = await stripe.confirmCardSetup(
        button.dataset.secret, {
        payment_method: {
            card: cardElement,
            billing_details: {
                name: name.value
            }
        }
    }
    );

    if (error) {
        //
    } else {
        const tokenInput = document.createElement('input');

        tokenInput.setAttribute('type', 'hidden');
        tokenInput.setAttribute('name', 'paymeny_method');
        tokenInput.setAttribute('value', setupIntent.payment_method);
        form.appendChild(tokenInput);

        form.submit();
    }
});