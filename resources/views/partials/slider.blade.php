<div class="container">
    <div class="col-md-12">
        <div id="main-slider">
            @foreach($sliders as $slider)
                <div class="item">
                    <img src="{{ asset('/sliders/'.$slider->image) }}" style="width: 100%; height: 300px" alt="" class="img-responsive">
                </div>
            @endforeach
        </div>
    </div>
</div>