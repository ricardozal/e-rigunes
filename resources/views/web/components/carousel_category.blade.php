@push('scripts')
    <script src="{{ asset('js/web/components/_catalogue-carousel.js') }}"></script>
@endpush
<div class="owl-carousel owl-catalogue owl-theme ">
@foreach($categorys as $cat)
        <a href="{{route('category_products',['categoryId'=>$cat->id])}}">
        <div class="card card-details mb-2 ">
            <img src="{{$cat->image_url}}" class=" img-fluid">
        </div>
        </a>
@endforeach
</div>
