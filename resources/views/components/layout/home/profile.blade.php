@props([
    'profile'
])
<!-- about-section -->
<section class="about-section pt_130 pb_120" id="profile">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-4.png);"></div>
        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-5.png);"></div>
        <div class="pattern-3" style="background-image: url(assets/images/shape/shape-6.png);"></div>
    </div>
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image_block_one">
                    <div class="image-box pl_80 pr_65 pb_40">
                        <div class="image-shape">
                            <div class="shape-1" style="background-image: url({{ asset('assets/images/shape/shape-2.png')}});"></div>
                            <div class="shape-2" style="background-image: url({{ asset('assets/images/shape/shape-3.png')}});"></div>
                        </div>
                        <figure class="image"><img src="{{ asset('storage/'. $profile->image) }}" alt="profile-image"></figure>
                        <div class="image-content centred bounce-slide">
                            <h2>20</h2>
                            <h4>Years of expericence</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_one">
                    <div class="content-box ml_30 sec-title-animation animation-style2">
                        <div class="sec-title mb_25">
                            <h2 class="title-animation">{{ $profile->title }}</h2>
                        </div>
                        <div class="text-box mb_45 title-animation">
                            <p>
                                {{ $profile->description }}
                            </p>
                        </div>
                        <div class="btn-box">
                            <a href="{{ route('profile.sejarah') }}" class="theme-btn">Get in Touch<span></span><span></span><span></span><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-section end -->