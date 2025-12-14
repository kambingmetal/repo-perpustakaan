@props([
    'collections' => []
])
<!-- service-section -->
<section class="service-section pt_120 pb_90">
    @if ($globalSettingPage->image_collection)
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{ asset('storage/' . $globalSettingPage->image_collection) }});"></div>
    @else        
    <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(/assets/images/background/service-bg.jpg);"></div>
    @endif
    <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-8.png);"></div>
    <div class="auto-container">
        <div class="sec-title centred mb_70 sec-title-animation animation-style2">
            <h2 class="title-animation">{{ $globalSettingPage->title_collection }}</h2>
            <h4 class="sub-title-animation" style="">{{ $globalSettingPage->subtitle_collection }}</h4>
        </div>
        
        @if($collections && $collections->count() > 0)
            <div class="row clearfix">
                @foreach($collections as $collection)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 service-block mb-4">
                        <div class="service-block-one" style="padding: 0; margin: 0;">
                            <a href="{{ $collection->url }}" target="_blank" class="collection-link" style="display: block; text-decoration: none;">
                                <div class="inner-box" style="overflow: hidden; border-radius: 8px; transition: transform 0.3s ease; padding: 0; margin: 0;">
                                    <div class="image-box" style="position: relative; padding: 0; margin: 0;">
                                        <figure class="image" style="margin: 0; padding: 0; line-height: 0;">
                                            @if($collection->image)
                                                <img src="{{ asset('storage/' . $collection->image) }}" 
                                                     alt="{{ $collection->title }}" 
                                                     style="width: 100%; height: 280px; object-fit: cover; display: block; transition: transform 0.3s ease; border-radius: 8px;">
                                            @else
                                                <img src="https://via.placeholder.com/400x280/4A90E2/FFFFFF?text={{ urlencode($collection->title) }}" 
                                                     alt="{{ $collection->title }}" 
                                                     style="width: 100%; height: 280px; object-fit: cover; display: block; transition: transform 0.3s ease; border-radius: 8px;">
                                            @endif
                                        </figure>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Tombol Lihat Semua -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('collections') }}" class="theme-btn btn-one">
                        Lihat Semua Koleksi
                        <span></span><span></span><span></span><span></span>
                    </a>
                </div>
            </div>
            
            <style>
                .collection-link:hover .inner-box {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                }
                .collection-link:hover .overlay {
                    transform: translateY(0);
                }
                .collection-link:hover img {
                    transform: scale(1.05);
                }
            </style>
        @else
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="empty-state py-5">
                        <i class="icon-book" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                        <h3 style="color: #666;">Koleksi Sedang Disiapkan</h3>
                        <p style="color: #888;">Koleksi buku digital kami sedang dalam proses pembaruan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- service-section end -->