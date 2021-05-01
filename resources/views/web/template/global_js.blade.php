{{--Bootstrap--}}
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="{{ asset('vue/js/app.js')  }}"></script>


{{-- Sweet Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

{{-- Form Tools --}}
<script src="{{ asset('commons/form_tools.js') }}"></script>

{{-- Modal Tools --}}
<script src="{{ asset('commons/modal_tools.js') }}"></script>

<script id="js-shopping_cart"
        src="{{asset("js/shopping_cart/shopping_cart.js?v=6")}}"
        data-token="{{csrf_token()}}"
        data-is-user="{{Auth::user()}}"
        data-url-get-order="{{route('web_get_order')}}"
        data-url-go-to-shopping-cart="{{route("web_shopping_cart")}}"
        data-url-update-variant="{{route("web_update_variant")}}"
        data-url-attach-coupon="{{route("web_attach_coupon")}}"
        data-url-delete-coupon="{{route("web_delete_coupon")}}"
        data-url-login="{{route("login")}}"
        data-url-complete-order="{{route('ecommerce_complete_order')}}"
        data-url-complete-order-guest="{{route('web_complete_order_guest')}}"
        data-url-update-current-step="{{route("web_update_current_step")}}"
        data-url-shop="{{route('web_home')}}"
        data-url-address-create="{{route('ecommerce_account_address_create')}}"
        data-url-card-create="{{route('ecommerce_account_payment_method_create')}}"
        data-url-addresses="{{route('ecommerce_account_address_content')}}"
        data-url-payment-methods="{{route('web_payment_methods')}}"
        data-url-cards="{{route('ecommerce_account_get_cards')}}"
        data-env-paypal="{{env('APP_DEBUG') ? 'sandbox' : 'production'}}"
        data-sandbox-paypal-id="{{env('APP_DEBUG') ? env('PAYPAL_CLIENT_ID') : '--'}}"
        data-production-paypal-id="{{env('APP_DEBUG') ? '--' : env('PAYPAL_CLIENT_ID')}}"
        data-url-get-shipping-price="{{route('ecommerce_get_shipping_price')}}"
        data-url-get-shipping-price-guest="{{route('web_get_shipping_price_guest')}}"
        data-stripe-public="{{env('STRIPE_PUBLIC_KEY')}}"
        data-stripe-intent="{{route('web_create_payment_stripe')}}"
></script>
