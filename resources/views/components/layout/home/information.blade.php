@props([
    'informations',
    'setting_page'
])

<!-- events-section -->
<section class="events-section pt_120">
     @if ($globalSettingPage->image_info)
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{ asset('storage/' . $globalSettingPage->image_info) }});"></div>
    @else
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(/assets/images/background/research-bg.jpg);"></div>
    @endif
    <div class="auto-container">
        <div class="sec-title mb_70 centred sec-title-animation animation-style2">
            <h2 class="title-animation">{{ $globalSettingPage->title_info }}</h2>
            <h4 class="sub-title-animation" style="">{{ $globalSettingPage->subtitle_info }}</h4>
        </div>
        <div class="row clearfix">
            @foreach($informations as $info)
                <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                    <div class="events-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <a href="{{ route('information.detail', $info->id) }}" style="text-decoration: none; color: inherit;">
                            <div class="inner-box">
                                <figure class="image-box" style="position: relative;">
                                    @php
                                        $isYouTube = false;
                                        $youtubeId = '';
                                        $imageUrl = '';
                                        
                                        // Check if there's a YouTube link
                                        if ($info->youtube_link) {
                                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $info->youtube_link, $matches)) {
                                                $isYouTube = true;
                                                $youtubeId = $matches[1];
                                                $imageUrl = "https://img.youtube.com/vi/{$youtubeId}/maxresdefault.jpg";
                                            }
                                        }
                                        
                                        // If no YouTube link or invalid, use regular image
                                        if (!$isYouTube) {
                                            if ($info->image) {
                                                $imageUrl = asset('storage/' . $info->image);
                                            } else {
                                                $imageUrl = "https://via.placeholder.com/400x300/4A90E2/FFFFFF?text=" . urlencode($info->title);
                                            }
                                        }
                                    @endphp
                                    
                                    <img src="{{ $imageUrl }}" 
                                         alt="{{ $info->title }}"
                                         style="width: 100%; height: 250px; object-fit: cover;"
                                         onerror="this.src='https://via.placeholder.com/400x300/4A90E2/FFFFFF?text={{ urlencode($info->title) }}';">
                                    
                                    @if($isYouTube)
                                        <!-- YouTube Play Icon -->
                                        <div class="play-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(255, 0, 0, 0.9); border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; z-index: 10; transition: all 0.3s ease;">
                                            <i class="fas fa-play" style="color: white; font-size: 20px; margin-left: 3px;"></i>
                                        </div>
                                        <!-- YouTube Badge -->
                                        <div class="youtube-badge" style="position: absolute; top: 15px; right: 15px; background: rgba(255, 0, 0, 0.95); color: white; padding: 8px 12px; border-radius: 6px; font-size: 12px; font-weight: bold; box-shadow: 0 2px 8px rgba(0,0,0,0.3); transition: all 0.3s ease;">
                                            <i class="fab fa-youtube mr-2"></i>VIDEO
                                        </div>
                                    @endif
                                </figure>
                                <div class="lower-content">
                                    <span class="location-box" style="padding-left:0px">{{ $info->category->name }}</span>
                                    <div class="post-date"><h2>{{ date('d', strtotime($info->created_at)) }}<span>{{ date('M', strtotime($info->created_at)) }}</span></h2></div>
                                    <h3>{{ $info->title }}</h3>
                                    <p>{{ $info->overview }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="more-btn centred pt_30">
            <a href="{{ route('informations') }}" class="theme-btn btn-one">Lihat Semua Informasi<span></span><span></span><span></span><span></span></a>
        </div>
    </div>
</section>

<style>
    .events-block-one:hover .play-icon {
        background: rgba(255, 0, 0, 1) !important;
        transform: translate(-50%, -50%) scale(1.1);
    }
    .events-block-one:hover .youtube-badge {
        background: rgba(255, 0, 0, 1) !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }
    .events-block-one:hover .image-box img {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
    .events-block-one .image-box {
        overflow: hidden;
    }
    .events-block-one .image-box img {
        transition: transform 0.3s ease;
    }
</style>

<!-- events-section end -->