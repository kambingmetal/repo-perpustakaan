@props([
    'setting_page'
])
<!-- service-section -->
<section class="service-section pt_120 pb_90">
    <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/service-bg.jpg);"></div>
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-8.png);"></div>
    <div class="auto-container">
        <div class="sec-title centred mb_70 sec-title-animation animation-style2">
            <h2 class="title-animation">{{ $setting_page->title_collection }}</h2>
            <h4 class="sub-title-animation" style="">{{ $setting_page->subtitle_collection }}</h4>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 service-block">
                <div class="service-block-one">
                    <div class="inner-box py-4">
                        <h3><a href="service-details.html">Condensate Treatment</a></h3>
                        <p>Condensate treatment is a crucial aspect of industrial process, particularly in systems.</p>
                        <div class="link"><a href="service-details.html">Discover More <i class="fal fa-angle-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service-section end -->