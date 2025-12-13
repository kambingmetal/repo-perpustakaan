@props(['sliders'])

<!-- banner-section -->
<section class="banner-section p_relative">
    <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-nav-none">
        @foreach($sliders as $slider)
            <div class="slide-item p_relative">
                <div class="bg-layer" style="background-image: url({{ asset('storage/' . $slider->image) }});"></div>
                <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
                <div class="auto-container">
                    <div class="content-box p_relative d_block z_5">
                        <h2>{{ $slider->title }}<span>{{ $slider->subtitle }}</span></h2>
                        <p>{{ $slider->description }}</p>
                        <div class="btn-box">
                            <a href="{{ $slider->button_url }}" class="theme-btn">{{ $slider->button_text }} <span></span><span></span><span></span><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- banner-section end -->