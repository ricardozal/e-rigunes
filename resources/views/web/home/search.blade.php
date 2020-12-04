@extends('web.template.main')
@push('scripts')
    <script src="{{asset('js/web/search/index.js?v=1')}}"></script>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-12 col-lg-6 mx-lg-auto">
                <div class="form-group">
                    <label for="search">Buscar</label>
                    <input type="text" class="form-control" id="search" placeholder="Buscar...">
                </div>
            </div>
            <div class="col-12 text-center">
                <button id="btn-search" class="btn btn-primary">Buscar</button>
            </div>
        </div>
        <div class="row product-container my-5">
            @include('web.home._search_results',['products' => $products])
        </div>
    </div>

@endsection
