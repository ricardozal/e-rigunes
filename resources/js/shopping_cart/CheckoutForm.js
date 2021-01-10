import React, { useState, useEffect } from "react";
import {
    CardElement,
    useStripe,
    useElements
} from "@stripe/react-stripe-js";
export default function CheckoutForm(props) {
    const [succeeded, setSucceeded] = useState(false);
    const [error, setError] = useState(null);
    const [processing, setProcessing] = useState('');
    const [disabled, setDisabled] = useState(true);
    const [clientSecret, setClientSecret] = useState('');
    const stripe = useStripe();
    const elements = useElements();
    const script = document.getElementById("js-shopping_cart");
    const urlIntent = script.dataset.stripeIntent;
    const token = script.dataset.token;
    const cardholderName = document.getElementById('holder-name');
    useEffect(() => {
        // Create PaymentIntent as soon as the page loads
        window
            .fetch(urlIntent, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({items: [{ id: "xl-tshirt" }], _token: token})
            })
            .then(res => {
                return res.json();
            })
            .then(data => {
                setClientSecret(data.client_secret);
            });
    }, []);
    const cardStyle = {
        style: {
            base: {
                color: "#32325d",
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#32325d"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        }
    };
    const handleChange = async (event) => {
        // Listen for changes in the CardElement
        // and display any errors as the customer types their card details
        setDisabled(event.empty);
        setError(event.error ? event.error.message : "");
    };
    const handleSubmit = async ev => {
        ev.preventDefault();
        setError(null);
        if(cardholderName.value === ''){
            setError("Debes llenar todos los campos");
        } else {
            setProcessing(true);
            const payload = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: elements.getElement(CardElement),
                    billing_details: {
                        name: cardholderName.value,
                    }
                }
            });
            if (payload.error) {
                setError(`El pago falló: ${payload.error.message}`);
                setProcessing(false);
            } else {
                setError(null);
                setProcessing(false);
                setSucceeded(true);
                props.saveOrder();
            }
        }

    };
    return (
        <form id="payment-form" onSubmit={handleSubmit} className={'text-center'}>
            <div className="form-group">
                <input type="text" className="form-control" id="holder-name"
                    placeholder="Nombre del propietario" name="holder-name"/>
            </div>
            <CardElement id="card-element" options={cardStyle} onChange={handleChange} />
            <button
                disabled={processing || disabled || succeeded}
                id="submit" className={'btn btn-primary mt-3 '}
            >
        <span id="button-text">
          {processing ? (
              <i className="fas fa-spinner fa-spin spinner" id="spinner"/>
          ) : (
              "PAGAR"
          )}
        </span>
            </button>
            <br/>
            {/* Show any error that happens when processing the payment */}
            {error && (
                <span id="card-error" style={{color: 'red', fontWeight: 'bold'}}>{error}</span>
            )}
        </form>
    );
}
