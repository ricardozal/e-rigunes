@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/dashboard/index.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="{{asset('js/admin/dashboard/chartDashboard.js')}}"></script>
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Dashboard</strong>
                </div>
            </div>

            <div class="row justify-content-center">
                @include('admin.home.components.kpi')
            </div>
            <div class="row justify-content-center pt-5">
                @include('admin.home.components.chartsDashboard')
            </div>
        </div>
    </div>
@endsection
