import React from 'react'
import TextFormatter from "../../../public/js/web/services/TextFormatter";

const ItemVariant = ({orderVariant, updateVariant}) => {

    return <React.Fragment>
        <div className="row my-3">
            <div className="col-6 col-lg-3">
                <div style={{backgroundImage: "url(" + orderVariant.variant.featured_image + ")"}} className="square-image">
                </div>
            </div>
            <div className="col-6 col-lg-4 d-flex flex-column justify-content-center align-items-center">
                <h3 className="text-thin">{orderVariant.variant.product.name}</h3>
                <p className="color-gray small">
                    <i className={(orderVariant.variant.rating_average >= 1) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                    <i className={(orderVariant.variant.rating_average >= 2) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                    <i className={(orderVariant.variant.rating_average >= 3) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                    <i className={(orderVariant.variant.rating_average >= 4) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                    <i className={(orderVariant.variant.rating_average == 5) ? 'fas fa-star color-yellow' : 'far fa-star color-yellow'}></i>
                    <span>{orderVariant.variant.rating_average}</span>
                </p>
                <p className="color-gray">
                    Color: {orderVariant.variant.color_name.name} <br/>
                    Talla: {orderVariant.variant.size.value}
                </p>
            </div>
            <div className="col-6 col-lg-2 mt-2 mt-lg-0 d-flex justify-content-center align-items-center">
                <div className="form-group">
                    <label>Cantidad</label>
                    <input className={"form-control"}
                           type="number"
                           onChange={event => {
                               if (event.target.value === ''){
                                   updateVariant(0, orderVariant.variant)
                               } else {
                                   updateVariant(event.target.value, orderVariant.variant)
                               }
                           }}
                           value={orderVariant.quantity}/>
                </div>
            </div>
            <div className="col-6 col-lg-2 mt-2 mt-lg-0 d-flex justify-content-center align-items-center">
                <h4 className="color-primary text-thin">{TextFormatter.asMoney(orderVariant.price)}</h4>
            </div>
            <div className="col-12 col-lg-1 my-3 my-md-0 d-flex justify-content-center align-items-center">
                <i className="fas fa-trash-alt cursor-pointer color-primary"
                   onMouseDown={event => updateVariant(0, orderVariant.variant)}/>
            </div>
        </div>
        <div style={{height: "1px", width: "90%", marginLeft: "5%", backgroundColor: "gray"}}/>
    </React.Fragment>

};

export default ItemVariant;
