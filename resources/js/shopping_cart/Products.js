import React from 'react';
import TextFormatter from "../../../public/js/web/services/TextFormatter";
import ItemVariant from "./ItemVariant";

class Products extends React.Component{

    constructor(props) {
        super(props);

        const script = $("#js-shopping_cart");
        this.urlShop = script.data("urlShop");
    }

    render(){
        return (
            <div className="col-12 p-0">
                <div className="row my-3 mr-lg-3 ml-lg-5 mx-1">
                    <div className="col-12 col-lg-9">
                        <div className="card border-radius mb-3 mb-lg-0">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-12 col-lg-8">
                                        <h3 className="color-primary text-thin my-3"><i className="fas fa-shopping-cart"></i> &nbsp; Mi carrito de compras</h3>
                                    </div>
                                    <div className="col-12 col-lg-4">
                                        <a href={this.urlShop} className="btn btn-primary my-3">REGRESAR</a>
                                    </div>
                                </div>
                                <div className="row mt-3">
                                    <div className="col-12">
                                        {this.displayVariants()}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="card border-radius my-3">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-12 col-lg-6">
                                        <h3 className="color-primary text-thin my-3"><i className="fas fa-shopping-cart"></i> &nbsp; Descuentos por código</h3>
                                    </div>
                                    {this.renderCoupon()}
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
                                <div className="row">
                                    <div className="col-12 text-center">
                                        <button onClick={ () => {this.props.onBuy(2,0,0,0)} } className={'btn btn-primary mt-3 '}>COMPRAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    displayVariants() {
        const variants = this.props.order.order_has_variant;
        return variants.map((orderVariant, key) =>
            <ItemVariant
                key={orderVariant.variant.id}
                orderVariant={orderVariant}
                updateVariant={this.props.updateVariant}
            />);
    }

    renderCoupon() {
        if (this.props.order !== undefined && this.props.order.discounts !== null && this.props.order.discounts !== 0) {
            return <div className="col-12 col-lg-6">
                <span>Cupón:</span>
                <span className="badge badge-pill badge-danger cursor-pointer ml-2">
                            {this.props.order.coupon_code}
                    <span aria-hidden="true ml-2" onMouseDown={() => this.props.deleteDiscount()}> &times;</span>
                </span>
            </div>
        } else {
            return <div className="col-12 col-lg-6">
                <div className="row">
                    <div className="col-12 mb-3">
                        <label className="sr-only" htmlFor="inp-coupon">Cupón</label>
                        <input type="text"
                               className={(this.props.errorCoupon !== undefined && this.props.errorCoupon !== "") ? " form-control is-invalid" : "form-control "}
                               id="inp-coupon"
                               placeholder="Cupón"/>
                        <div className="invalid-feedback">
                            {this.props.errorCoupon}
                        </div>
                    </div>
                    <div className="col-12">
                        <button className="btn btn-primary w-100" onMouseDown={() => this.props.attachDiscount()}>
                            Aplicar
                        </button>
                    </div>
                </div>
            </div>
        }
    }

}

export default Products;
