{{--Bootstrap--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

{{-- Sweet Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

{{-- Form Tools --}}
<script src="{{ asset('commons/form_tools.js') }}"></script>

{{-- Modal Tools --}}
<script src="{{ asset('commons/modal_tools.js') }}"></script>

<script id="js-shopping_cart"
        src="{{asset("js/shopping_cart/shopping_cart.js?v=4")}}"
        data-token="{{csrf_token()}}"
        data-is-user="{{Auth::user()}}"
        data-url-get-order="{{route('web_get_order')}}"
        data-url-go-to-shopping-cart="{{route("web_shopping_cart")}}"
        data-url-update-variant="{{route("web_update_variant")}}"
        data-url-attach-coupon="{{route("web_attach_coupon")}}"
        data-url-delete-coupon="{{route("web_delete_coupon")}}"
        data-url-login="{{route("login")}}"
        data-url-complete-order="{{route('ecommerce_complete_order')}}"
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
></script>
