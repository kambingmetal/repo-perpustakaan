<x-layout.main pageTitle="{{ $information->title }}">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Detail Informasi</h2>
                <ul class="bread-crumb">
                    <li>{{ Str::limit($information->title, 30) }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details-section pt_120 pb_180">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="inner-box">
                            <!-- Featured Image/Video -->
                            @if($information->youtube_link)
                                @php
                                    $youtubeId = '';
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $information->youtube_link, $matches)) {
                                        $youtubeId = $matches[1];
                                    }
                                @endphp
                                @if($youtubeId)
                                    <figure class="image-box mb-4">
                                        <div class="embed-responsive embed-responsive-16by9" style="border-radius: 8px; overflow: hidden; height: 400px;">
                                            <iframe class="embed-responsive-item" 
                                                    src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                                                    style="width: 100%; height: 100%; border: none;"
                                                    allowfullscreen>
                                            </iframe>
                                        </div>
                                    </figure>
                                @endif
                            @elseif($information->image)
                                <figure class="image-box mb-4">
                                    <img src="{{ asset('storage/' . $information->image) }}" 
                                         alt="{{ $information->title }}"
                                         style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px;">
                                </figure>
                            @endif
                            
                            <!-- Article Meta -->
                            <div class="post-info mb-4">
                                <ul class="list-unstyled d-flex flex-wrap align-items-center" style="gap: 20px; color: #666;">
                                    <li><i class="fas fa-calendar mr-2"></i>{{ date('d F Y', strtotime($information->created_at)) }}</li>
                                    @if($information->category)
                                        <li><i class="fas fa-tag mr-2"></i>{{ $information->category->name }}</li>
                                    @endif
                                </ul>
                            </div>
                            
                            <!-- Article Title -->
                            <h1 class="mb-4" style="font-size: 32px; line-height: 1.3; color: #333;">{{ $information->title }}</h1>
                            
                            <!-- Overview -->
                            @if($information->overview)
                                <div class="overview mb-4 p-4" style="background: #f8f9fa; border-left: 4px solid #4A90E2; border-radius: 4px;">
                                    <h5 style="color: #4A90E2; margin-bottom: 15px;">Ringkasan</h5>
                                    <p style="margin: 0; font-style: italic; color: #666; line-height: 1.6;">{{ $information->overview }}</p>
                                </div>
                            @endif
                            
                            <!-- Content -->
                            <div class="content" style="line-height: 1.8; color: #555; font-size: 16px;">
                                @if($information->content)
                                    {!! $information->content !!}
                                @else
                                    <p>Konten detail untuk informasi ini sedang dalam proses pembaruan.</p>
                                @endif
                            </div>
                            
                            <!-- Share Buttons -->
                            <div class="share-section mt-5 pt-4" style="border-top: 1px solid #eee;">
                                <h6 class="mb-3">Bagikan Informasi:</h6>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                       target="_blank" class="btn btn-primary btn-sm mr-2 mb-2">
                                        <i class="fab fa-facebook-f mr-1"></i> Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($information->title) }}" 
                                       target="_blank" class="btn btn-info btn-sm mr-2 mb-2">
                                        <i class="fab fa-twitter mr-1"></i> Twitter
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($information->title . ' - ' . request()->fullUrl()) }}" 
                                       target="_blank" class="btn btn-success btn-sm mr-2 mb-2">
                                        <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <!-- Other Information -->
                        @if($otherInformations && $otherInformations->count() > 0)
                            <div class="sidebar-widget recent-post">
                                <div class="widget-title">
                                    <h4>Informasi Lainnya</h4>
                                </div>
                                <div class="widget-content">
                                    @foreach($otherInformations as $other)
                                        <div class="post-widget mb-4">
                                            <div class="post" style="background: white; border-radius: 12px; box-shadow: 0 3px 15px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease; overflow: hidden;">
                                                <figure class="post-thumb" style="margin: 0; position: relative; width: 100%;">
                                                    <a href="{{ route('information.detail', $other->id) }}" class="thumb-link">
                                                        @php
                                                            $isYouTube = false;
                                                            $youtubeId = '';
                                                            $imageUrl = '';
                                                            
                                                            // Check if there's a YouTube link
                                                            if ($other->youtube_link) {
                                                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $other->youtube_link, $matches)) {
                                                                    $isYouTube = true;
                                                                    $youtubeId = $matches[1];
                                                                    $imageUrl = "https://img.youtube.com/vi/{$youtubeId}/maxresdefault.jpg";
                                                                }
                                                            }
                                                            
                                                            // If no YouTube link or invalid, use regular image
                                                            if (!$isYouTube) {
                                                                if ($other->image) {
                                                                    $imageUrl = asset('storage/' . $other->image);
                                                                } else {
                                                                    $imageUrl = "https://via.placeholder.com/400x150/4A90E2/FFFFFF?text=" . urlencode($other->title);
                                                                }
                                                            }
                                                        @endphp
                                                        
                                                        <img src="{{ $imageUrl }}" 
                                                             alt="{{ $other->title }}"
                                                             style="width: 100%; height: 150px; object-fit: cover; transition: transform 0.3s ease;"
                                                             onerror="this.src='https://via.placeholder.com/400x150/4A90E2/FFFFFF?text={{ urlencode($other->title) }}';">
                                                        
                                                        @if($isYouTube)
                                                            <!-- YouTube Play Icon -->
                                                            <div class="play-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(255, 0, 0, 0.9); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; z-index: 10;">
                                                                <i class="fas fa-play" style="color: white; font-size: 14px; margin-left: 2px;"></i>
                                                            </div>
                                                            <!-- YouTube Badge -->
                                                            <div class="youtube-badge" style="position: absolute; top: 8px; right: 8px; background: rgba(255, 0, 0, 0.9); color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; font-weight: bold;">
                                                                <i class="fab fa-youtube mr-1"></i>VIDEO
                                                            </div>
                                                        @endif
                                                    </a>
                                                </figure>
                                                <div class="text" style="padding: 15px;">
                                                    <h6 style="margin-bottom: 8px; line-height: 1.4;">
                                                        <a href="{{ route('information.detail', $other->id) }}" 
                                                           style="color: #2c3e50; text-decoration: none; font-size: 15px; font-weight: 600; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                            {{ $other->title }}
                                                        </a>
                                                    </h6>
                                                    @if($other->overview)
                                                        <p style="margin: 0 0 12px 0; color: #7f8c8d; font-size: 13px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                            {{ Str::limit($other->overview, 80) }}
                                                        </p>
                                                    @endif
                                                    <div class="meta-info" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; padding-top: 8px; border-top: 1px solid #f0f0f0;">
                                                        @if($other->category)
                                                            <span class="category" style="color: #4A90E2; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background: #e8f4fd; padding: 4px 8px; border-radius: 4px;">
                                                                {{ $other->category->name }}
                                                            </span>
                                                        @endif
                                                        <span class="post-date" style="color: #95a5a6; font-size: 11px; font-weight: 500;">
                                                            <i class="fas fa-clock mr-1" style="font-size: 10px;"></i>{{ date('d M Y', strtotime($other->created_at)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .post-widget:hover .post {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
            border-color: #e3e9ef !important;
        }
        .post-widget:hover .thumb-link img {
            transform: scale(1.05);
        }
        .post-widget a:hover {
            color: #4A90E2 !important;
        }
        .social-links a:hover {
            transform: translateY(-2px);
            transition: transform 0.3s ease;
        }
        .content p {
            margin-bottom: 20px;
        }
        .content h1, .content h2, .content h3, .content h4 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #333;
        }
        .play-icon {
            transition: all 0.3s ease;
        }
        .post-widget:hover .play-icon {
            background: rgba(255, 0, 0, 1) !important;
            transform: translate(-50%, -50%) scale(1.1);
        }
        .youtube-badge {
            transition: all 0.3s ease;
        }
        .post-widget:hover .youtube-badge {
            background: rgba(255, 0, 0, 1) !important;
        }
        .widget-title h4 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #4A90E2;
            position: relative;
        }
        .widget-title h4::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 30px;
            height: 3px;
            background: #34495e;
        }
    </style>
</x-layout.main>