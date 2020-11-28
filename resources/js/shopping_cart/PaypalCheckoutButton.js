import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import paypal from 'paypal-checkout';

const PaypalCheckoutButton = ({ onFinishSuccess, onFinishWithError, onCancelEven, loadingView, order, sandboxPaypalId, productionPaypalId, envPaypal}) => {

    const paypalConf = {
        currency: 'MXN',
        env: envPaypal,
        client: {
            sandbox: sandboxPaypalId,
            production: productionPaypalId,
        },
        style: {
            label: 'pay',
            size: 'medium',
            shape: 'rect',
            color: 'gold',
        },
    };

    const PayPalButton = paypal.Button.driver('react', { React, ReactDOM });

    const payment = (data, actions) => {
        const payment = {
            transactions: [
                {
                    amount: {
                        total: order.total,
                        currency: paypalConf.currency,
                        details: {
                            subtotal: order.subtotal,
                            shipping: order.shipping_price,
                        }
                    },
                    description: "Compra en Rigunes",
                    custom: order.customer || "",
                    item_list: {
                        items: order.items,
                    },
                },
            ],
            note_to_payer: 'Contáctanos para cualquier aclaración sobre tu compra.',
        };

        return actions.payment.create({
            payment,
        });
    };

    const onAuthorize = (data, actions) => {
        return actions.payment.execute()
            .then(response => {
                onFinishSuccess();
            })
            .catch(error => {
                onFinishWithError();
            });
    };

    const onError = (error) => {
        console.log(error);
        onFinishWithError();
    };

    const onCancel = (data, actions) => {
        onCancelEven();
    };

    return (
        <PayPalButton
            env={paypalConf.env}
            client={paypalConf.client}
            payment={(data, actions) => payment(data, actions)}
            onAuthorize={(data, actions) => onAuthorize(data, actions)}
            onCancel={(data, actions) => onCancel(data, actions)}
            onError={(error) => onError(error)}
            style={paypalConf.style}
            commit
            locale="es_MX"
        />

    );

};

export default PaypalCheckoutButton;
