@props(['sliders', 'heroContents'])

<!-- banner-section -->
<section class="banner-section p_relative">
    <div class="auto-container row">
        <div class="col-8 banner-carousel owl-theme owl-carousel owl-dots-none owl-nav-none" style="height: 580px;">
            @foreach($sliders as $slider)
                <div class="slide-item p_relative" style="height: 480px;">
                    <div class="bg-layer" style="background-image: url({{ asset('storage/' . $slider->image) }}); height: 480px;"></div>
                    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);height: 480px;"></div>
                    <div class="content-box p_relative d_block z_5">
                        <h2 style="font-size: 18px; padding: 0; margin: 0 0 5px 0; line-height: 1.2;">
                            {{ $slider->title }}
                            <span style="font-size: 32px; display: block; margin-top: 8px; font-weight: 700;">{{ $slider->subtitle }}</span>
                        </h2>
                        <p style="font-size: 17px; line-height: 1.4; margin-bottom: 15px;">{{ $slider->description }}</p>
                        <div class="btn-box">
                            <a href="{{ $slider->button_url }}" class="theme-btn" style="padding: 12px 28px; font-size: 16px;">{{ $slider->button_text }} <span></span><span></span><span></span><span></span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4 pt-3">
            <div class="row">
                @foreach($heroContents->take(2) as $index => $heroContent)
                    <x-gallery.gallery-item classCol="col-12 h-fit" :gallery="$heroContent" :index="$index" />
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->