import React from 'react';
import ReactDOM from 'react-dom';
import {Elements} from '@stripe/react-stripe-js';
import {loadStripe} from '@stripe/stripe-js';

import CheckoutForm from './CheckoutForm';
import TextFormatter from "../../../public/js/web/services/TextFormatter";
import PaypalCheckoutButton from "./PaypalCheckoutButton";
import axios from "axios";

class ConfirmOrderGuest extends React.Component{

    constructor(props) {
        super(props);

        const script = document.getElementById("js-shopping_cart");
        this.envPaypal = script.dataset.envPaypal;
        this.sandboxPaypalId = script.dataset.sandboxPaypalId;
        this.productionPaypalId = script.dataset.productionPaypalId;
        this.urlPaymentMethods = script.dataset.urlPaymentMethods;

        this.stripePromise = loadStripe(script.dataset.stripePublic);

        this.setError = this.setError.bind(this);
        this.setCanceled = this.setCanceled.bind(this);
        this.setPaypalCompleted = this.setPaypalCompleted.bind(this);
        this.setLoading = this.setLoading.bind(this);

        this.state = {
            isLoading: true,
            orderForPaypal: undefined,
            paymentMethodSelected: 0,
            paymentMethods: undefined,
        };
    }

    componentDidMount() {
        axios
            .get(this.urlPaymentMethods)
            .then(response => {
                this.setState({
                    paymentMethods: response.data.paymentMethods,
                    isLoading: false,
                });
            }).catch(response => {

        });

        this.makeOrderForPaypal();
    }

    makeOrderForPaypal(){

        var currentItems = [];


        this.props.order.order_has_variant.forEach((item, index) => {

            var currentItem = {
                sku: item.variant.sku === null ? 'Sin SKU' : item.variant.sku,
                name: item.variant.product.name,
                price: item.variant.product.public_price,
                quantity: parseInt(item.quantity),
                currency: 'MXN'
            };

            currentItems.push(currentItem);

        });

        var currentOrder = {
            customer: "Comprador de Rigunes",
            total: this.numberFormatPaypal(this.props.order.total_price),
            subtotal: this.numberFormatPaypal(this.props.order.total_price-this.props.order.shipping_price),
            shipping_price: this.props.order.shipping_price,
            items: currentItems
        };

        this.setState({
            orderForPaypal: currentOrder,
        });

    }

    render(){
        if (this.state.isLoading) {
            return (
                <React.Fragment>
                    <div className="row w-100">
                        <div className="col-12 p-5">
                            <div className="card border-radius">
                                <div className="card-body">
                                    <div className={"div-spinner"}>
                                        <div className="sk-chase">
                                            <div className="sk-chase-dot"/>
                                            <div className="sk-chase-dot"/>
                                            <div className="sk-chase-dot"/>
                                            <div className="sk-chase-dot"/>
                                            <div className="sk-chase-dot"/>
                                            <div className="sk-chase-dot"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </React.Fragment>
            )
        }

        return (
            <div className="col-12 p-0">
                <div className="row my-3 mr-lg-3 ml-lg-5 mx-1">
                    <div className="col-12 col-lg-9">
                        <div className="card border-radius mb-3 mb-lg-0">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-12 col-lg-8">
                                        <h3 className="color-primary text-thin my-3"><i className="fas fa-info-circle"></i> &nbsp; Información de envío</h3>
                                    </div>
                                    <div className="col-12 col-lg-4">
                                        <button onClick={ () => {this.props.onReturn(0)} } className="btn btn-primary my-3">REGRESAR</button>
                                    </div>
                                </div>
                                <div className="row mt-3">
                                    <div className="col-12">
                                        <h3>Información personal</h3>
                                    </div>
                                    <div className="col-12">
                                        <p><strong>Nombre completo: </strong> {this.props.order.personal_info.full_name}</p>
                                        <p><strong>Correo electrónico: </strong> {this.props.order.personal_info.email}</p>
                                        <p><strong>Teléfono: </strong> {this.props.order.personal_info.phone}</p>
                                    </div>
                                </div>
                                <div className="row mt-3">
                                    <div className="col-12">
                                        <h3>Dirección</h3>
                                        <p>{this.props.order.address_info.street}
                                            , No. ext {this.props.order.address_info.ext_num}
                                            , No. int {this.props.order.address_info.int_num != null ? this.props.order.address_info.int_num : 'Sin número interior'}
                                            , Colonia {this.props.order.address_info.colony}
                                            , Código postal {this.props.order.address_info.zip_code}
                                            , {this.props.order.address_info.state}
                                            , {this.props.order.address_info.country}</p>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-12">
                                        <span className="color-black bottom-border">Método de pago</span>
                                    </div>
                                    <div className="col-12 d-flex flex-wrap justify-content-center">
                                        {this.displayPaymentMethods()}
                                    </div>
                                    <div className="col-12 my-3">
                                        {this.paymentMethodSelected()}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-12 col-lg-3">
                        <div className="card h-100 border-radius">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-12 mt-3">
                                        <h4 className="color-primary text-thin"><i className="fas fa-shopping-cart"></i> &nbsp; Orden de compra</h4>
                                        {this.props.onDisplayResume()}
                                    </div>
                                    <div className="col-12 mb-3">
                                        <div style={{height: "1px", width: "90%", marginLeft: "5%"}} className="bg-gray"/>
                                    </div>
                                    <div className="col-12 text-right">
                                        <h5 className={'color-primary text-thin'}>Envío: {TextFormatter.asMoney(this.props.order.shipping_price)}</h5>
                                    </div>
                                    <div className="col-12 text-right">
                                        <h5 className={'color-secondary text-thin'}>Descuento por código: {TextFormatter.asMoney(this.props.order.discounts)}</h5>
                                    </div>
                                    <div className="col-12 text-right my-4">
                                        <h4 className={'color-primary text-thin'}>Total: {TextFormatter.asMoney(parseFloat(this.props.order.total_price))}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    paymentMethodSelected(){

        switch (this.state.paymentMethodSelected) {
            case 0:
                return <span>Elige un método de pago</span>;
            case 1:
                return <div className="row">
                    <div className="col-12 text-center">
                        <PaypalCheckoutButton onFinishSuccess={this.setPaypalCompleted}
                                              onFinishWithError={this.setError}
                                              onCancelEven={this.setCanceled}
                                              loadingView={this.setLoading}
                                              order={this.state.orderForPaypal}
                                              sandboxPaypalId={this.sandboxPaypalId}
                                              productionPaypalId={this.productionPaypalId}
                                              envPaypal={this.envPaypal} />
                    </div>
                </div>;
            case 2:
                return <div className="row">
                    <div className="col-12">
                        <Elements stripe={this.stripePromise}>
                            <CheckoutForm />
                        </Elements>
                    </div>
                </div>;

        }

    }

    displayPaymentMethods(){

        const paymentMethods = this.state.paymentMethods;
        let content = [];
        if(paymentMethods.length > 0) {
            paymentMethods.forEach((paymentMethod, index) => {

                content.push(<div key={'payment-method-' + index} className="text-center mx-5 cursor-pointer" onClick={() => {
                        this.selectPaymentMethod(paymentMethod.id)
                    }}>
                        <span className="color-primary">{paymentMethod.name}</span>
                    </div>
                );
            });
        } else{
            content.push(
                <div key={'card-Non'} className={'row'}>
                    <div className="col-12 text-center">
                        <h5 className={'d-block'}>Sin métodos de pagos disponibles.</h5>
                    </div>
                </div>
            );
        }

        return content;
    }

    setError(){
        this.setState({ isLoading: false });
        Swal.fire({
            icon: 'error',
            title: 'Atención',
            text: 'Algo salió mal en el proceso de pago, intente más tarde.',
        });

    }

    setCanceled(){
        this.setState({ isLoading: false });
        Swal.fire({
            icon: 'info',
            title: 'Atención',
            text: 'El pago se ha cancelado.',
        });
    }

    setLoading(){
        this.setState({ isLoading: true });
    }

    setPaypalCompleted(){
        this.setState({ isLoading: false });
        this.props.onBuy(3,-1,-1, 1);
    }

    numberFormatPaypal( num ) {
        return num.toFixed(2)
    }

    selectPaymentMethod(id){
        this.setState({
            paymentMethodSelected: id
        });

    }

    nextStep(){
        this.props.onBuy(3,-1,-1, 2);
    }
}

export default ConfirmOrderGuest;
