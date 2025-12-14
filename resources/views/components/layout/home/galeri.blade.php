@props([
    'galeries',
    'setting_page'
])

<!-- research-section -->
<section class="research-section pt_120 pb_90">
    @if ($globalSettingPage->image_gallery)
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{ asset('storage/' . $globalSettingPage->image_gallery) }});"></div>
    @else
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/research-bg.jpg);"></div>
    @endif
    <div class="auto-container">
        <div class="inner-container p_relative z_5">
            <div class="sec-title light centred mb_70 sec-title-animation animation-style2">
                <h2 class="title-animation">{{ $globalSettingPage->title_gallery }}</h2>
                <h4 class="sub-title-animation" style="color: white">{{ $globalSettingPage->subtitle_gallery }}</h4>
            </div>
            <div class="row clearfix justify-content-center">
                @foreach($galeries as $index => $galery)
                    <x-gallery.gallery-item :gallery="$galery" :index="$index" />
                @endforeach
            </div>
            
            <!-- Tombol Lihat Semua Galeri -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('galleries') }}" class="theme-btn btn-one">
                        Lihat Semua Galeri
                        <span></span><span></span><span></span><span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<x-gallery.gallery-modal />

<!-- research-section end -->