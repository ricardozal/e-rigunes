<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">{{$category->name}}</h4>
</div>
<div class="row">
    <div class="col-12 text-center my-5">
        <img src="{{$category->absolute_image_url}}" onerror="this.src='{{asset('img/icons/ic-default-img.png')}}'" style="width: 500px; height: 300px"/>
    </div>
</div>
