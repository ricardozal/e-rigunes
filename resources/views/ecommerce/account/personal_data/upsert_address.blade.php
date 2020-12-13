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
    <input type="hidden" value="{{route('ecommerce_account_profile_index')}}" id="inp-url-personal-data">
@endsection
