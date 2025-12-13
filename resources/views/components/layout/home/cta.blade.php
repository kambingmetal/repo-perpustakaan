@props(['globalSettingPage'])

<!-- cta-style-two -->
@if($globalSettingPage->cta_image)
    <section class="cta-style-two">
        <div class="auto-container">
            <div class="inner-container" style="
                position: relative; 
                overflow: hidden;
                border-radius: 8px;
            ">
                
                <!-- Responsive Aspect Ratio CSS -->
                <style>
                    .cta-style-two .inner-container {
                        /* Mobile: 25% of viewport width as height for square-ish ratio */
                        min-height: 25vw;
                        max-height: 200px;
                    }
                    
                    @media (min-width: 768px) {
                        .cta-style-two .inner-container {
                            /* Tablet: 20% of viewport width */
                            min-height: 20vw;
                            max-height: 250px;
                        }
                    }
                    
                    @media (min-width: 1024px) {
                        .cta-style-two .inner-container {
                            /* Desktop: 18% of viewport width */
                            min-height: 18vw;
                            max-height: 280px;
                        }
                    }
                    
                    @media (min-width: 1200px) {
                        .cta-style-two .inner-container {
                            /* Large Desktop: 15% of viewport width */
                            min-height: 15vw;
                            max-height: 300px;
                        }
                    }
                </style>
                
                <!-- Background Image -->
                <div class="cta-bg-image" style="
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-image: url({{ asset('storage/' . $globalSettingPage->cta_image) }});
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    z-index: 1;
                    border-radius: 8px;
                "></div>
                
                <!-- Overlay -->
                <div class="cta-overlay" style="
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.3);
                    z-index: 2;
                    border-radius: 8px;
                "></div>
                
                <!-- CTA Link -->
                @if($globalSettingPage->cta_url)
                    <a href="{{ $globalSettingPage->cta_url }}" class="cta-link" style="
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        z-index: 3;
                        cursor: pointer;
                        text-decoration: none;
                        display: block;
                        border-radius: 8px;
                    " target="_blank" rel="noopener"></a>
                @endif
            </div>
        </div>
    </section>
@else
    <!-- Fallback CTA when no image is set -->
    <section class="cta-style-two">
        <div class="auto-container">
            <div class="inner-container">
                <div id="particles-js"></div>
                <div class="content-box">
                    <h2>Bergabunglah dengan perpustakaan digital <br />terdepan di Indonesia</h2>
                    <div class="btn-box">
                        <a href="{{ route('layanan.jenis-layanan') }}" class="theme-btn btn-one mr_20">Lihat Layanan<span></span><span></span><span></span><span></span></a>
                        <a href="{{ route('contact') }}" class="theme-btn btn-one">Hubungi Kami<span></span><span></span><span></span><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- cta-style-two end -->