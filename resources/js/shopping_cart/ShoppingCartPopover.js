import React from 'react';
import axios from 'axios';
import { unmountComponentAtNode, render } from "react-dom";
import TextFormatter from "../../../public/js/web/services/TextFormatter";

class ShoppingCartPopover extends React.Component{

    constructor(props) {
        super(props);
        const script = document.getElementById("js-shopping_cart");
        this.urlGetOrder = script.dataset.urlGetOrder;
        this.urlGoShoppingCart = script.dataset.urlGoToShoppingCart;

        this.handleClick = this.handleClick.bind(this);

        this.state = {
            order: undefined,
            isLoading: true,
        }
    }

    componentDidMount() {
        axios
            .get(this.urlGetOrder)
            .then(response => {
                this.setState({
                    order: response.data,
                    isLoading: false,
                })
            }).catch(response => {
        })
    }

    componentWillUnmount() {
        this.setState = (state,callback)=>{
            return;
        };
    }

    handleClick() {
        let el = document.getElementById("shopping-popover");
        el.classList.remove('d-block');
        unmountComponentAtNode(el);
    }

    render() {
        const header = <div className="pop-cart-header">
            <i className="fas fa-shopping-cart"></i> &nbsp; <h5 className="text-thin">Mi carrito</h5>
            <i className="btn-cart fas fa-times-circle ml-auto cursor-pointer" onClick={this.handleClick}></i>
        </div>;

        if (this.state.isLoading) {
            return (
                <React.Fragment>
                    {header}
                    <div className={"div-spinner bg-white"}>
                        <div className="sk-chase">
                            <div className="sk-chase-dot"/>
                            <div className="sk-chase-dot"/>
                            <div className="sk-chase-dot"/>
                            <div className="sk-chase-dot"/>
                            <div className="sk-chase-dot"/>
                            <div className="sk-chase-dot"/>
                        </div>
                    </div>
                </React.Fragment>
            )
        }

        if (this.state.order === null || this.state.order.length === 0 || this.state.order.order_has_variant.length === 0) {
            return (
                <React.Fragment>
                    {header}
                    <div className={"div-spinner bg-white"}>
                        <span>No existen productos en el carrito</span>
                    </div>
                </React.Fragment>
            )
        }

        return (
            <React.Fragment>
                {header}
                <div className={"pop-cart-body mx-auto"}>
                    {this.displayVariants()}
                </div>
                <div className="text-center my-2">
                    <a className="btn btn-primary btn-sm" href={this.urlGoShoppingCart} onClick={this.handleClick}>Ver más</a>
                </div>
            </React.Fragment>
        )
    }

    displayVariants() {
        const variants = this.state.order.order_has_variant;
        return variants.map((orderVariant, key) =>
            <React.Fragment key={'variant-'+key }>
                <div className="variant-row">
                    <div className="variant-img">
                        <div style={{backgroundImage: "url(" + orderVariant.variant.featured_image + ")"}} className="square-image">
                        </div>
                    </div>
                    <div className="variant-desc">
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
                    <div className="variant-price">
                        {TextFormatter.asMoney(orderVariant.price)}
                    </div>
                </div>
                <div style={{height: "1px", width: "90%", marginLeft: "5%", backgroundColor: "gray"}}/>
            </React.Fragment>);
    }

}

export default ShoppingCartPopover
