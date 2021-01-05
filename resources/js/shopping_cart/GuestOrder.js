import React from 'react';
import TextFormatter from "../../../public/js/web/services/TextFormatter";
import axios from 'axios'

class GuestOrder extends React.Component{

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
                                        <h3 className="color-primary text-thin my-3"><i className="fas fa-info-circle"></i> &nbsp; Información de envío</h3>
                                    </div>
                                    <div className="col-12 col-lg-4">
                                        <button onClick={ () => {this.props.onReturn()} } className="btn btn-primary my-3">REGRESAR</button>
                                    </div>
                                </div>
                                <div className="row mt-3">
                                    <div className="col-12 text-center">
                                        <h3>Información personal</h3>
                                    </div>
                                    <div className="col-12">
                                        <div className="form-group">
                                            <label htmlFor="full_name">Nombre completo</label>
                                            <input type="text" className="form-control" id="full_name"
                                                   name="full_name"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="email">Coreo electrónico</label>
                                            <input type="email" className="form-control" id="email"
                                                   name="email"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="phone">Teléfono</label>
                                            <input type="text" className="form-control" id="phone"
                                                   name="phone"/>
                                        </div>
                                    </div>
                                </div>
                                <div className="row mt-3">
                                    <div className="col-12 text-center">
                                        <h3>Dirección</h3>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="street">Calle</label>
                                            <input type="text" className="form-control" id="street"
                                                   name="street"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="zip_code">Código Postal</label>
                                            <input type="text" className="form-control" id="zip_code"
                                                   name="zip_code"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="ext_num">Número exterior</label>
                                            <input type="number" className="form-control" id="ext_num"
                                                   name="ext_num"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="int_num">Número Interior</label>
                                            <input type="number" className="form-control" id="int_num"
                                                   name="int_num"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="colony">Colonia</label>
                                            <input type="text" className="form-control" id="colony"
                                                   name="colony"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="city">Ciudad/Municipio</label>
                                            <input type="text" className="form-control" id="city"
                                                   name="city"/>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="state">Estado</label>
                                            <select className="form-control" id="state" name="state">
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Baja California">Baja California</option>
                                                <option value="Baja California Sur">Baja California Sur</option>
                                                <option value="Campeche">Campeche</option>
                                                <option value="Chiapas">Chiapas</option>
                                                <option value="Chihuahua">Chihuahua</option>
                                                <option value="CDMX">Ciudad de México</option>
                                                <option value="Coahuila">Coahuila</option>
                                                <option value="Colima">Colima</option>
                                                <option value="Durango">Durango</option>
                                                <option value="Estado de México">Estado de México</option>
                                                <option value="Guanajuato">Guanajuato</option>
                                                <option value="Guerrero">Guerrero</option>
                                                <option value="Hidalgo">Hidalgo</option>
                                                <option value="Jalisco">Jalisco</option>
                                                <option value="Michoacán">Michoacán</option>
                                                <option value="Morelos">Morelos</option>
                                                <option value="Nayarit">Nayarit</option>
                                                <option value="Nuevo León">Nuevo León</option>
                                                <option value="Oaxaca">Oaxaca</option>
                                                <option value="Puebla">Puebla</option>
                                                <option value="Querétaro">Querétaro</option>
                                                <option value="Quintana Roo">Quintana Roo</option>
                                                <option value="San Luis Potosí">San Luis Potosí</option>
                                                <option value="Sinaloa">Sinaloa</option>
                                                <option value="Sonora">Sonora</option>
                                                <option value="Tabasco">Tabasco</option>
                                                <option value="Tamaulipas">Tamaulipas</option>
                                                <option value="Tlaxcala">Tlaxcala</option>
                                                <option value="Veracruz">Veracruz</option>
                                                <option value="Yucatán">Yucatán</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div className="col-12 col-lg-6">
                                        <div className="form-group">
                                            <label htmlFor="country">País</label>
                                            <select className="form-control" id="country" name="country">
                                                <option value="México">México</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div className="col-12">
                                        <div className="form-group">
                                            <label htmlFor="references">Referencias</label>
                                            <textarea className="form-control" id="references" rows="3"/>
                                        </div>
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
                                <div className="row">
                                    <div className="col-12 text-center">
                                        <button onClick={ () => {this.props.onBuy(0,0,0,0)} } className={'btn btn-primary mt-3 '}>PAGAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

}

export default GuestOrder;
