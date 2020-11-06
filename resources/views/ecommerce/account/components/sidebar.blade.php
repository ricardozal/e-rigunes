@php
    $route = Route::current()->getName();
@endphp

<ul class="nav  justify-content-between flex-lg-column mt-5">
    <div class="card card-data mb-3">
        <div class="card-body">
            <li class="nav-item my-2">
                <a class="nav-link " href="{{route('ecommerce_account_profile_index')}}"><i class="far fa-user icon"></i>&nbsp;&nbsp;Datos personales</a>
            </li>
        </div>

    </div>
    <div class="card card-data mb-3">
        <div class="card-body">

            <li class="nav-item my-2">
                <a class="nav-link " href=""><i class="fas fa-money-check"></i>&nbsp;&nbsp;Método de pago</a>
            </li>
        </div>
    </div>

    <div class="card card-data mb-3">
        <div class="card-body">

            <li class="nav-item my-2">
                <a class="nav-link " href="">&nbsp;&nbsp;Mis pedidos</a>
            </li>
        </div>
    </div>
</ul>

