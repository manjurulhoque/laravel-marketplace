<div class="container">
    <div class="col-md-12">
        <div id="main-slider">
            @foreach($sliders as $slider)
                <div class="item">
                    <img src="{{ asset($slider->image) }}" style="width: 100%" alt="" class="img-responsive">
                </div>
            @endforeach
        </div>
    </div>
</div>