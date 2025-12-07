@props(['statistics', 'setting_page'])

<!-- statistic-section -->
<section class="funfact-section pt_130 pb_120 centred">
    <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/funfact-bg.jpg);"></div>
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-7.png);"></div>
    </div>
    <div class="auto-container">
        <div class="sec-title light mb_70 sec-title-animation animation-style2">
            <h2 class="title-animation">{{ $setting_page->title_statistic }}</h2>
            <h4 class="sub-title-animation" style="color: white">{{ $setting_page->subtitle_statistic }}</h4>
        </div>
        <div class="row clearfix">
            @foreach($statistics as $statistic)
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            {{-- icon hero icon --}}
                            <div class="icon-box"><i class="{{ $statistic->icon }}"></i></div>
                            <div class="count-outer count-box">
                                <span class="odometer" data-count="{{ $statistic->value }}">0</span><span>+</span>
                            </div>
                            <p>{{ $statistic->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- statistic-section end -->