@props([
    'informations',
    'setting_page'
])

<!-- events-section -->
<section class="events-section pt_120">
    <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/events-bg.jpg);"></div>
    <div class="auto-container">
        <div class="sec-title mb_70 centred sec-title-animation animation-style2">
            <h2 class="title-animation">{{ $setting_page->title_info }}</h2>
            <h4 class="sub-title-animation" style="">{{ $setting_page->subtitle_info }}</h4>
        </div>
        <div class="row clearfix">
            @foreach($informations as $info)
                <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                    <div class="events-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="events-details.html"><img src="{{ asset('storage/'.$info->image) }}" alt=""></a></figure>
                            <div class="lower-content">
                                <span class="location-box" style="padding-left:0px">{{ $info->category->name }}</span>
                                <div class="post-date"><h2>{{ date('d', strtotime($info->created_at)) }}<span>{{ date('M', strtotime($info->created_at)) }}</span></h2></div>
                                <h3><a href="events-details.html">{{ $info->title }}</a></h3>
                                <p>{{ $info->overview }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="more-btn centred pt_30">
            <a href="index.html" class="theme-btn btn-one">View All Events<span></span><span></span><span></span><span></span></a>
        </div>
    </div>
</section>
<!-- events-section end -->