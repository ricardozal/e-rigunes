import React from 'react';
import {ElementsConsumer, CardElement} from '@stripe/react-stripe-js';

import CardSection from './CardSection';

class CheckoutForm extends React.Component {

    constructor(props) {
        super(props);
        const script = document.getElementById("js-shopping_cart");
        this.stripeIntent = script.dataset.stripeIntent;
        this.handleSubmit = this.handleSubmit.bind(this)

    }


    handleSubmit(event) {
        event.preventDefault();

        const {stripe, elements} = this.props;

        if (!stripe || !elements) {
            return;
        }

        (async () => {
            const response = await fetch(this.stripeIntent);
            const {client_secret: clientSecret} = await response.json();

            const result = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: elements.getElement(CardElement),
                    billing_details: {
                        name: 'Jenny Rosen',
                    },
                }
            });

            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                }
            }
        })();
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit} className={'text-center'}>
                <CardSection />
                <button type="submit" disabled={!this.props.stripe} className={'btn btn-primary mt-3 '}>PAGAR</button>
            </form>
        );
    }
}

export default function InjectedCheckoutForm() {
    return (
        <ElementsConsumer>
            {({stripe, elements}) => (
                <CheckoutForm stripe={stripe} elements={elements} />
            )}
        </ElementsConsumer>
    );
}
