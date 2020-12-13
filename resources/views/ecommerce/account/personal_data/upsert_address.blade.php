@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="{{asset('js/ecommerce/account/address/index.js')}}"></script>
@endpush
@section('content-account')
    <div class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 pb-5 px-5">
                <h1 class="text-center py-4 color-primary">{{isset($address) ? 'Modificar dirección' : 'Agregar dirección'}}</h1>
                <form id="form-create-address"
                      action="{{isset($address) ? route('ecommerce_account_address_update_post',['addressId' => $address->id]) : route('ecommerce_account_address_create_post')}}"
                      method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="street">Calle</label>
                                <input type="text" name="street" id="street" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->street: null}}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="zip_code">Código Postal</label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->zip_code: null}}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="ext_num">Número exterior</label>
                                <input type="text" name="ext_num" id="ext_num" class="form-control mb-4"
                                   value="{{ isset($address) ? $address->ext_num: null}}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="int_num">Número Interior</label>
                                <input type="text" name="int_num" id="int_num" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->int_num: null}}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="colony">Colonia</label>
                                <input type="text" name="colony" id="colony" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->colony: null}}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="city">Ciudad/Municipio</label>
                                <input type="text" name="city" id="city" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->city: null}}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="state">Estado</label>
                                <select name="state" id="state" class="form-control mb-4">
                                    <option value="Aguascalientes" {{isset($address) ? (strpos($address->state, substr('Aguascalientes', 1, 5)) ? 'selected' : '') : ''}}>Aguascalientes</option>
                                    <option value="Baja California" {{isset($address) ? (strpos($address->state, substr('Baja California', 1, 5)) ? 'selected' : '') : ''}}>Baja California</option>
                                    <option value="Baja California Sur" {{isset($address) ? (strpos($address->state, substr('Baja California Sur', 1, 5)) ? 'selected' : '') : ''}}>Baja California Sur</option>
                                    <option value="Campeche" {{isset($address) ? (strpos($address->state, substr('Campeche', 1, 5)) ? 'selected' : '') : ''}}>Campeche</option>
                                    <option value="Chiapas" {{isset($address) ? (strpos($address->state, substr('Chiapas', 1, 5)) ? 'selected' : '') : ''}}>Chiapas</option>
                                    <option value="Chihuahua" {{isset($address) ? (strpos($address->state, substr('Chihuahua', 1, 5)) ? 'selected' : '') : ''}}>Chihuahua</option>
                                    <option value="Ciudad de México" {{isset($address) ? (strpos($address->state, substr('Ciudad de México', 1, 5)) ? 'selected' : '') : ''}}>Ciudad de México</option>
                                    <option value="Coahuila" {{isset($address) ? (strpos($address->state, substr('Coahuila', 1, 5)) ? 'selected' : '') : ''}}>Coahuila</option>
                                    <option value="Colima" {{isset($address) ? (strpos($address->state, substr('Colima', 1, 5)) ? 'selected' : '') : ''}}>Colima</option>
                                    <option value="Durango" {{isset($address) ? (strpos($address->state, substr('Durango', 1, 5)) ? 'selected' : '') : ''}}>Durango</option>
                                    <option value="Estado de México" {{isset($address) ? (strpos($address->state, substr('Estado de México', 1, 5)) ? 'selected' : '') : ''}}>Estado de México</option>
                                    <option value="Guanajuato" {{isset($address) ? (strpos($address->state, substr('Guanajuato', 1, 5)) ? 'selected' : '') : ''}}>Guanajuato</option>
                                    <option value="Guerrero" {{isset($address) ? (strpos($address->state, substr('Guerrero', 1, 5)) ? 'selected' : '') : ''}}>Guerrero</option>
                                    <option value="Hidalgo" {{isset($address) ? (strpos($address->state, substr('Hidalgo', 1, 5)) ? 'selected' : '') : ''}}>Hidalgo</option>
                                    <option value="Jalisco" {{isset($address) ? (strpos($address->state, substr('Jalisco', 1, 5)) ? 'selected' : '') : ''}}>Jalisco</option>
                                    <option value="Michoacán" {{isset($address) ? (strpos($address->state, substr('Michoacán', 1, 5)) ? 'selected' : '') : ''}}>Michoacán</option>
                                    <option value="Morelos" {{isset($address) ? (strpos($address->state, substr('Morelos', 1, 5)) ? 'selected' : '') : ''}}>Morelos</option>
                                    <option value="Nayarit" {{isset($address) ? (strpos($address->state, substr('Nayarit', 1, 5)) ? 'selected' : '') : ''}}>Nayarit</option>
                                    <option value="Nuevo León" {{isset($address) ? (strpos($address->state, substr('Nuevo León', 1, 5)) ? 'selected' : '') : ''}}>Nuevo León</option>
                                    <option value="Oaxaca" {{isset($address) ? (strpos($address->state, substr('Oaxaca', 1, 5)) ? 'selected' : '') : ''}}>Oaxaca</option>
                                    <option value="Puebla" {{isset($address) ? (strpos($address->state, substr('Puebla', 1, 5)) ? 'selected' : '') : ''}}>Puebla</option>
                                    <option value="Querétaro" {{isset($address) ? (strpos($address->state, substr('Querétaro', 1, 5)) ? 'selected' : '') : ''}}>Querétaro</option>
                                    <option value="Quintana Roo" {{isset($address) ? (strpos($address->state, substr('Quintana Roo', 1, 5)) ? 'selected' : '') : ''}}>Quintana Roo</option>
                                    <option value="San Luis Potosí" {{isset($address) ? (strpos($address->state, substr('San Luis Potosí', 1, 5)) ? 'selected' : '') : ''}}>San Luis Potosí</option>
                                    <option value="Sinaloa" {{isset($address) ? (strpos($address->state, substr('Sinaloa', 1, 5)) ? 'selected' : '') : ''}}>Sinaloa</option>
                                    <option value="Sonora" {{isset($address) ? (strpos($address->state, substr('Sonora', 1, 5)) ? 'selected' : '') : ''}}>Sonora</option>
                                    <option value="Tabasco" {{isset($address) ? (strpos($address->state, substr('Tabasco', 1, 5)) ? 'selected' : '') : ''}}>Tabasco</option>
                                    <option value="Tamaulipas" {{isset($address) ? (strpos($address->state, substr('Tamaulipas', 1, 5)) ? 'selected' : '') : ''}}>Tamaulipas</option>
                                    <option value="Tlaxcala" {{isset($address) ? (strpos($address->state, substr('Tlaxcala', 1, 5)) ? 'selected' : '') : ''}}>Tlaxcala</option>
                                    <option value="Veracruz" {{isset($address) ? (strpos($address->state, substr('Veracruz', 1, 5)) ? 'selected' : '') : ''}}>Veracruz</option>
                                    <option value="Yucatán" {{isset($address) ? (strpos($address->state, substr('Yucatán', 1, 5)) ? 'selected' : '') : ''}}>Yucatán</option>
                                    <option value="Zacatecas" {{isset($address) ? (strpos($address->state, substr('Zacatecas', 1, 5)) ? 'selected' : '') : ''}}>Zacatecas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="country">País</label>
                                <select name="country" id="country" class="form-control mb-4">
                                    <option value="México">México</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="references">Referencias</label>
                                <textarea class="form-control" id="references" name="references" rows="3">
                                    {{ isset($address) ? $address->references: null}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pb-4">
                        <button type="submit" class="btn btn-primary font-family-2 mt-3 without-border font-size-nav color-white" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <input type="hidden"
           value="{{$fromCart ? route('web_shopping_cart') : route('ecommerce_account_profile_index')}}"
           id="inp-url-personal-data">
@endsection
