<x-layout.main pageTitle="Informasi">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Informasi</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Informasi</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-section pt_70 pb_180 centred">
        <div class="auto-container">
            <div class="row clearfix justify-content-center">
                @forelse($informations as $index => $info)
                    <div class="col-lg-4 col-md-6 col-sm-12 events-block mb-4">
                        <div class="events-block-one wow fadeInUp animated" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="1500ms">
                            <a href="{{ route('information.detail', $info->id) }}" style="text-decoration: none; color: inherit;">
                                <div class="inner-box" style="transition: transform 0.3s ease, box-shadow 0.3s ease; min-height: 450px; display: flex; flex-direction: column;">
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
                                                    $imageUrl = "https://via.placeholder.com/400x250/4A90E2/FFFFFF?text=Info";
                                                }
                                            }
                                        @endphp
                                        
                                        <img src="{{ $imageUrl }}" 
                                             alt="{{ $info->title }}" 
                                             style="width: 100%; height: 250px; object-fit: cover;"
                                             onerror="this.src='https://via.placeholder.com/400x250/4A90E2/FFFFFF?text={{ urlencode($info->title) }}';">
                                        
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
                                    <div class="lower-content" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                        @if($info->category)
                                            <span class="location-box" style="padding-left:0px">{{ $info->category->name }}</span>
                                        @endif
                                        <div class="post-date">
                                            <h2>{{ date('d', strtotime($info->created_at)) }}<span>{{ date('M', strtotime($info->created_at)) }}</span></h2>
                                        </div>
                                        <h3>{{ $info->title }}</h3>
                                        <p>{{ Str::limit($info->overview, 100) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="empty-state py-5">
                            @if(!empty($searchTerm))
                                <i class="fas fa-search" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                                <h3 style="color: #666;">Tidak Ada Hasil</h3>
                                <p style="color: #888;">Tidak ditemukan informasi untuk kata kunci "<em>{{ $searchTerm }}</em>"</p>
                                <a href="{{ route('informations') }}" class="btn btn-primary mt-3">Lihat Semua Informasi</a>
                            @else
                                <i class="fas fa-info-circle" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                                <h3 style="color: #666;">Belum Ada Informasi</h3>
                                <p style="color: #888;">Informasi terbaru sedang dalam proses pembaruan. Silakan kembali lagi nanti.</p>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        .events-block-one:hover .inner-box {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        .events-block-one:hover img {
            transform: scale(1.05);
        }
        .events-block-one:hover .play-icon {
            background: rgba(255, 0, 0, 1) !important;
            transform: translate(-50%, -50%) scale(1.1);
        }
        .events-block-one:hover .youtube-badge {
            background: rgba(255, 0, 0, 1) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }
        .events-block-one .inner-box {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            cursor: pointer;
        }
        .events-block-one .image-box {
            height: 250px;
            overflow: hidden;
        }
        .events-block-one .image-box img {
            transition: transform 0.3s ease;
        }
        .search-form .form-control:focus {
            border-color: #357ABD;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }
        .search-form .btn:hover {
            background: #357ABD;
            border-color: #357ABD;
        }
        .search-info {
            color: #666;
        }
        .search-info em {
            color: #4A90E2;
            font-weight: 600;
        }
    </style>
</x-layout.main>