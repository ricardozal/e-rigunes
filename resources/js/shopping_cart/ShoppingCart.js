import React from 'react';
import axios from 'axios'
import Products from './Products';
import ConfirmOrder from './ConfirmOrder';
import GuestOrder from './GuestOrder';
import TextFormatter from "../../../public/js/web/services/TextFormatter";

class ShoppingCart extends React.Component {

    constructor(props) {
        super(props);

        const script = document.getElementById("js-shopping_cart");

        this.urlGetOrder = script.dataset.urlGetOrder;
        this.isAuthenticate = script.dataset.isUser;
        this.urlUpdateVariant = script.dataset.urlUpdateVariant;
        this.urlLogin = script.dataset.urlLogin;
        this.urlAttachCoupon = script.dataset.urlAttachCoupon;
        this.urlDeleteCoupon = script.dataset.urlDeleteCoupon;
        this.urlUpdateCurrentStep = script.dataset.urlUpdateCurrentStep;
        this.urlCompleteOrder = script.dataset.urlCompleteOrder;
        this.urlGetShippingPrice = script.dataset.urlGetShippingPrice;
        this.urlGetShippingPriceGuest = script.dataset.urlGetShippingPriceGuest;

        this.updateVariant = this.updateVariant.bind(this);
        this.onBuy = this.onBuy.bind(this);
        this.onReturn = this.onReturn.bind(this);
        this.onDisplayResume = this.onDisplayResume.bind(this);
        this.attachDiscount = this.attachDiscount.bind(this);
        this.deleteDiscount = this.deleteDiscount.bind(this);
        this.getShippingPrice = this.getShippingPrice.bind(this);
        this.getShippingPriceAsGuest = this.getShippingPriceAsGuest.bind(this);

        this.state = {
            isLoading: true,
            order: undefined,
            current_step: undefined,
            errorCoupon: "",
        }
    }

    componentDidMount() {
        axios
            .get(this.urlGetOrder)
            .then(response => {
                this.setState({
                    isLoading: false,
                    order: response.data,
                    current_step: response.data.current_step
                });

            }).catch(response => {

        })
    }

    render() {
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

        return(
            <div className={'row w-100 m-0'}>
                {this.renderContent()}
            </div>
        );

    }

    renderContent(){

        let content = [];

        if(this.state.order !== undefined){

            if (this.state.order === null || this.state.order.length === 0 || this.state.order.order_has_variant.length === 0) {
                content = <React.Fragment>
                    <div className="col-12 p-5">
                        <div className="card border-radius">
                            <div className="card-body">
                                <div className={"div-spinner"}>
                                    <span>No existen productos en el carrito</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </React.Fragment>;
            } else {
                switch(this.state.current_step){
                    case 0:
                        content = <GuestOrder onReturn={this.onReturn}
                                              order={this.state.order}
                                              onDisplayResume={this.onDisplayResume}
                                              getShippingPriceAsGuest={this.getShippingPriceAsGuest}
                        />;
                        break;
                    case 1:
                        content = <Products order={this.state.order}
                                            onBuy={this.onBuy}
                                            updateVariant={this.updateVariant}
                                            attachDiscount={this.attachDiscount}
                                            deleteDiscount={this.deleteDiscount}
                                            errorCoupon={this.state.errorCoupon}
                                            onDisplayResume={this.onDisplayResume}
                        />;
                        break;
                    case 2:
                        content = <ConfirmOrder order={this.state.order}
                                                onBuy={this.onBuy}
                                                onReturn={this.onReturn}
                                                getShippingPrice={this.getShippingPrice}
                                                onDisplayResume={this.onDisplayResume}
                        />;
                        break;
                }
            }

            return content;
        }

        return ' ';

    }

    updateVariant(value, variant) {
        if (value === "") {
            const order = this.state.order;
            order.order_has_variant =
                order.order_has_variant.map(orderVariant => {
                    if (orderVariant.variant.id === variant.id) {
                        orderVariant.quantity = value;
                    }
                });
            this.setState({
                order: order
            });
            return;
        }

        if (event.target.value === "0" || event.target.value * 1 <= 0) {
            return;
        }

        const data = {
            quantity: value,
            variantId: variant.id
        };


        axios.post(this.urlUpdateVariant, data)
            .then(response => {
                if (response.status === 200) {
                    this.setState({
                        order: response.data.data
                    })
                }
            })
            .catch(err => {
                console.error(err);
            });
    }

    attachDiscount() {
        const coupon = document.getElementById("inp-coupon").value;
        const data = {
            coupon: coupon
        };

        axios.post(this.urlAttachCoupon, data)
            .then(response => {
                if (response.status === 200) {
                    if (response.data.success) {
                        this.setState({
                            order: response.data.data
                        })
                    } else {
                        this.setState({errorCoupon: response.data.message})
                    }
                }
            })
            .catch(err => {
                console.error(err);
            });
    }

    deleteDiscount() {
        axios
            .get(this.urlDeleteCoupon)
            .then(response => {
                this.setState({
                    order: response.data.data
                })
            }).catch(response => {

        })
    }

    getShippingPriceAsGuest(personalInformation, addressInformation, onSuccess){

        let validated = true;

        if(personalInformation.full_name === null || personalInformation.full_name.split(' ').join('') === ""){
            validated = false;
        } else if (personalInformation.email === null || personalInformation.email.split(' ').join('') === ""){
            validated = false;
        } else if (personalInformation.phone === null || personalInformation.phone.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.street === null || addressInformation.street.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.zip_code === null || addressInformation.zip_code.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.ext_num === null || addressInformation.ext_num.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.colony === null || addressInformation.colony.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.city === null || addressInformation.city.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.state === null || addressInformation.state.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.country === null || addressInformation.country.split(' ').join('') === ""){
            validated = false;
        } else if (addressInformation.references === null || addressInformation.references.split(' ').join('') === ""){
            validated = false;
        }

        if(validated){
            let data = {addressInfo: addressInformation, personalInfo: personalInformation};
            axios.post(this.urlGetShippingPriceGuest, data)
                .then(response => {
                    if (response.data.success) {
                        this.setState({
                            order: response.data.data
                        });
                        onSuccess();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Atención',
                            text: 'Algo salió mal',
                        });
                    }

                })
                .catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Atención',
                        text: err,
                    });
                });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Atención',
                text: 'Debes completar todos los campos',
            });
        }

    }

    getShippingPrice(id, onSuccess) {
        let data ={address_id: id};
        axios.post(this.urlGetShippingPrice, data)
            .then(response => {
                if (response.data.success) {
                    this.setState({
                        order: response.data.data
                    });
                    onSuccess();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Atención',
                        text: 'Algo salió mal',
                    });
                }

            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Atención',
                    text: err,
                });
            });
    }

    onDisplayResume(){

        const variants = this.state.order.order_has_variant;
        return variants.map((orderVariant, key) =>
            <React.Fragment key={'variant-'+key }>
                <div className="row my-4">
                    <div className="col-4">
                        <div style={{backgroundImage: "url(" + orderVariant.variant.featured_image + ")"}} className="square-image">
                        </div>
                    </div>
                    <div className="col-5 d-flex flex-column justify-content-center align-items-center">
                        <span className="text-semi-bold">{orderVariant.variant.product.name}</span>
                        <p className="color-gray small">
                            <i className={(orderVariant.variant.rating_average >= 1) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                            <i className={(orderVariant.variant.rating_average >= 2) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                            <i className={(orderVariant.variant.rating_average >= 3) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                            <i className={(orderVariant.variant.rating_average >= 4) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                            <i className={(orderVariant.variant.rating_average == 5) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                            <span>{orderVariant.variant.rating_average}</span>
                        </p>
                        <p className="color-gray">
                            <strong>Cantidad: {orderVariant.quantity}</strong>
                        </p>
                        <p className="color-gray small">
                            Color: {orderVariant.variant.color_name.name} <br/>
                            Talla: {orderVariant.variant.size.value}
                        </p>
                    </div>
                    <div className="col-3 color-primary d-flex justify-content-center align-items-center">
                        {TextFormatter.asMoney(orderVariant.price)}
                    </div>
                </div>
                <div style={{height: "1px", width: "90%", marginLeft: "5%", backgroundColor: "gray"}}/>
            </React.Fragment>);

    }

    onReturn(){

        const data = {
            step: 1
        };

        this.setState({
            isLoading: true,
        });

        axios.post(this.urlUpdateCurrentStep, data)
            .then(response => {
                if (response.status === 200) {
                    this.setState({
                        current_step: response.data.data.current_step,
                        isLoading: false
                    });
                }
            })
            .catch(err => {
                console.error(err);
            });

    }

    onBuy(step, addressId, cardId, paymentMethodId){

        if(!this.isAuthenticate && step === 0){
            this.setState({
                current_step: 0,
            });
        } else if(!this.isAuthenticate && step !== 0){
            location.replace(this.urlLogin)
        }else{
            if(addressId !== 0 && paymentMethodId !== 0){
                this.setState({
                    isLoading: true,
                });

                let data ={address_id: addressId, card_id: cardId, payment_method: paymentMethodId};

                axios.post(this.urlCompleteOrder, data)
                    .then(response => {
                        this.setState({
                            isLoading: false,
                        });
                        if (response.status === 200) {
                            if (response.data.success) {
                                window.location.href = response.data.order_resume;
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Atención',
                                    text: response.data.message,
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Atención',
                                text: response.data.message,
                            });
                        }
                    })
                    .catch(err => {
                        this.setState({
                            isLoading: false,
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Atención',
                            text: err,
                        });
                    });
            } else {
                const data = {
                    step: 2
                };
                this.setState({
                    isLoading: true,
                });

                axios.post(this.urlUpdateCurrentStep, data)
                    .then(response => {
                        if (response.status === 200) {
                            this.setState({
                                current_step: response.data.data.current_step,
                                isLoading: false
                            });
                        }
                    })
                    .catch(err => {
                        console.error(err);
                    });
            }
        }
    }

}

export default ShoppingCart
