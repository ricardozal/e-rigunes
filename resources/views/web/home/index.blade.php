hola {{Auth::check() ? Auth::user()->email : 'invitado'}}

@if(Auth::check())
<a href="{{route('ecommerce_account_profile_index')}}">mi cuenta</a>
<a href="{{route('logout')}}">salir</a>
@else
<a href="{{route('login')}}">entrar</a>
@endif
