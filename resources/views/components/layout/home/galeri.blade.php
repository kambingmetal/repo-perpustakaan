@props([
    'galeries',
    'setting_page'
])

<!-- research-section -->
<section class="research-section pt_120 pb_90">
    <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/research-bg.jpg);"></div>
    <div class="auto-container">
        <div class="inner-container p_relative z_5">
            <div class="sec-title light centred mb_70 sec-title-animation animation-style2">
                <h2 class="title-animation">{{ $setting_page->title_gallery }}</h2>
                <h4 class="sub-title-animation" style="color: white">{{ $setting_page->subtitle_gallery }}</h4>
            </div>
            <div class="row clearfix">
                @foreach($galeries as $galery)
                    <div class="col-lg-3 col-md-6 col-sm-12 research-block">
                        <div class="research-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="overlay-image"><img src="{{ asset('storage/'.$galery->image) }}" alt=""></figure>
                                    <figure class="image"><img src="{{ asset('storage/'.$galery->image) }}" alt=""></figure>
                                </div>
                                <div class="text-box">
                                    <h3><a>{{ $galery->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- research-section end -->