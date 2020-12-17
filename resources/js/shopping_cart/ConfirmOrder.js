import React from 'react';
import TextFormatter from "../../../public/js/web/services/TextFormatter";
import axios from 'axios'
import PaypalCheckoutButton from './PaypalCheckoutButton';

class ConfirmOrder extends React.Component{

    constructor(props) {
        super(props);

        const script = document.getElementById("js-shopping_cart");
        this.urlAddressCreate = script.dataset.urlAddressCreate;
        this.urlCardCreate = script.dataset.urlCardCreate;
        this.urlAddresses = script.dataset.urlAddresses;
        this.urlPaymentMethods = script.dataset.urlPaymentMethods;
        this.urlCards = script.dataset.urlCards;
        this.envPaypal = script.dataset.envPaypal;
        this.sandboxPaypalId = script.dataset.sandboxPaypalId;
        this.productionPaypalId = script.dataset.productionPaypalId;

        this.state = {
            addressId: 0,
            addresses: undefined,
            isLoading: true,
            paymentMethods: undefined,
            paymentMethodSelected: 0,
            cards: undefined,
            cardSelected: 0,
            orderForPaypal: undefined
        };

        this.nextStep = this.nextStep.bind(this);
        this.selectAddress = this.selectAddress.bind(this);
        this.selectPaymentMethod = this.selectPaymentMethod.bind(this);

        this.setError = this.setError.bind(this);
        this.setCanceled = this.setCanceled.bind(this);
        this.setPaypalCompleted = this.setPaypalCompleted.bind(this);
        this.setLoading = this.setLoading.bind(this);
    }

    componentDidMount() {

        axios
            .get(this.urlPaymentMethods)
            .then(response => {
                this.setState({
                    paymentMethods: response.data.paymentMethods
                });
            }).catch(response => {

        });

        axios
            .get(this.urlCards)
            .then(response => {
                this.setState({
                    cards: response.data.credit_cards,
                });
            }).catch(response => {

        });

        axios
            .get(this.urlAddresses)
            .then(response => {
                this.setState({
                    addresses: response.data.addresses,
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
        this.props.onBuy(3,this.state.addressId,0, 1);
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
                                    <div className="col-12">
                                        <h3 className="color-primary text-thin my-3"><i className="fas fa-shopping-cart"></i> &nbsp; Información de compra</h3>
                                    </div>
                                </div>
                                <div className="row mt-3">
                                    <div className="col-12">
                                        <span className="color-black bottom-border">Domicilios</span>&nbsp;&nbsp;&nbsp;
                                        <a href={this.urlAddressCreate+"?cart=1"}
                                           className="btn btn-primary-light btn-sm">Agregar</a>
                                    </div>
                                    <div className="col-12">
                                        {this.displayAddresses()}
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
                                        <h4 className="color-primary text-thin"><i className="fas fa-shopping-cart"></i> &nbsp; Confirmación orden de compra</h4>
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
                                <div className="row">
                                    <div className="col-12 text-center">
                                        <button onClick={ () => {this.props.onReturn()} } className={'btn btn-primary mt-3 '}>EDITAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    nextStep(){
        if(this.state.addressId !== 0 && this.state.cardSelected !== 0){
            this.props.onBuy(3,this.state.addressId,this.state.cardSelected, 2);
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Atención',
                text: 'Primero debes seleccionar una tarjeta como método de pago',
            });
        }
    }

    selectAddress(id){
        this.setState({
            addressId: id
        });
    }

    selectCard(id){
        this.setState({
            cardSelected: id
        });
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
                        <span className="color-black bottom-border">Tarjetas guardadas</span>&nbsp;&nbsp;&nbsp;
                        <a href={this.urlCardCreate+"?cart=1"}
                           className="btn btn-primary-light btn-sm">Agregar</a>
                    </div>
                    <div className="col-12">
                        {this.displayCards()}
                    </div>
                    <div className="col-12 text-center">
                        <button onClick={ () => {this.nextStep()} } className={'btn btn-primary mt-3 '}>PAGAR</button>
                    </div>
                </div>;

        }

    }

    selectPaymentMethod(id){
        if(this.state.addressId !== 0){
            this.setState({
                paymentMethodSelected: id
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Atención',
                text: 'Primero debes seleccionar una dirección de envío',
            });
        }
    }

    displayCards(){

        const cards = this.state.cards;
        let content = [];
        if(cards.length > 0) {
            cards.forEach((card, index) => {

                content.push(<div key={'card-' + index}
                                  className={card.id === this.state.cardSelected ? 'row my-5 card-address card-selected' : 'row my-5 card-address'}
                                  onClick={() => {
                                      this.selectCard(card.id)
                                  }}>
                    <div className="col-8 mx-auto p-2">
                        <strong>{card.cardholder}</strong>
                        <p>Número de tarjeta: {card.card_number}</p>
                        <p>Vencimiento: {card.expiration_month}/{card.expiration_year}</p>
                    </div>
                </div>);
            });
        } else{
            content.push(
                <div key={'card-Non'} className={'row'}>
                    <div className="col-12 text-center">
                        <h5 className={'d-block'}>Aún no has agregado tarjetas.</h5>
                    </div>
                </div>
            );
        }

        return content;

    }

    displayAddresses() {
        const addresses = this.state.addresses;
        let content = [];
        if(addresses.length > 0) {
            addresses.forEach((address, index) => {

                content.push(<div key={'address-' + index}
                                  className={address.id === this.state.addressId ? 'row my-5 card-address card-selected' : 'row my-5 card-address'}
                                  onClick={() => {

                                      Swal.fire({
                                          title: 'Por favor, espere...',
                                          allowEscapeKey: false,
                                          allowOutsideClick: false
                                      });
                                      Swal.showLoading();
                                      this.props.getShippingPrice(address.id, () => {
                                          this.selectAddress(address.id);
                                          this.makeOrderForPaypal();
                                          Swal.close();
                                      });
                                  }}>
                    <div className="col-12 p-4">
                        {address.full_address}
                    </div>
                </div>);
            });
        } else{
            content.push(
                <div key={'card-Non'} className={'row'}>
                    <div className="col-12 text-center">
                        <h5 className={'d-block'}>Aún no has agregado direcciones.</h5>
                    </div>
                </div>
            );
        }

        return content;
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

    numberFormatPaypal( num ) {
        return num.toFixed(2)
    }

}

export default ConfirmOrder;
