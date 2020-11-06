@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset("/commons/form_tools.js")}}"></script>
    <script src="{{ asset('js/web/components/subscriber.js?v=1') }}"></script>
@endpush
<hr>
<div class="container-fluid ">
    <div id="footer-wrapper" class="text-center">
        <div id="footer">
            <div class="row align-items-center mx-0 justify-content-center p-md-5">
                <div class="col-lg-4  my-auto text-left">
                    <h6 style="font-size: medium;">MI CUENTA</h6>
                    <h6 style="font-size: medium;">MIS PEDIDOS</h6>
                    <h6 style="font-size: medium;">CARRITO DE COMPRAS</h6>
                </div>
                <div class=" col-lg-4 my-auto text-left">
                    <a class="color-black" href=""><h6 style="font-size: medium">BLOG</h6></a>
                    <a class="color-black" href=""><h6 style="font-size: medium">
                            CONTACTO</h6></a>
                    <a class="color-black" href=""><h6 style="font-size: medium">
                            PREGUNTAS FRECUENTES </h6></a>
                    <a class="color-black" href="{{route('terms_condition_section')}}"><h6 style="font-size: medium; ">TERMINOS Y CONDICIONES</h6></a>
                </div>

                <div class=" col-12 col-lg-4 my-auto text-left">

                    <div class="row mx-0" >

                        <p class="color-primary h2"><b>Suscribete</b></p>
                        <form id="form-subscriber" action="" method="POST">
                            @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email"
                                   aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Enviar
                                </button>
                            </div>
                        </div>
                        </form>

                    </div>

                    <div class="row mx-0 justify-content-around">
                        <i class="fab fa-cc-paypal h1"></i>
                        <i class="fab fa-cc-visa h1"></i>
                        <i class="fab fa-cc-mastercard h1"></i>
                        <i class="fas fa-shipping-fast h1"></i>
                    </div>
                </div>
            </div>
            <div class="row " style="background-color:#B51F6B; ">
                <div class=" col-12 my-2 h4">
                    <a class="text-center mx-2 without-text-decoration" href="https://www.instagram.com/rigunes.mx/"
                       target="_blank">
                        <i class="fab fa-instagram color-white"></i></a>
                    <a class="text-center mx-2 without-text-decoration" href="https://www.facebook.com/Rigunes"
                       target="_blank">
                        <i class="fab fa-facebook-f color-white"></i>
                    </a>
                    <a class="text-center mx-2 without-text-decoration" href="" target="_blank">
                        <i class="fab fa-whatsapp color-white"></i>
                    </a>
                </div>
                <div class="col-12 my-2 color-white ">
                    <b>Copyright &copy; Rigunes 2020 - Todos los derechos reservados</b>
                </div>
            </div>
        </div>
    </div>
</div>



