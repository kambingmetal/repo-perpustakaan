<x-layout.main pageTitle="Koleksi Buku">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $settingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Koleksi Buku</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Koleksi Buku</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-section pt_70 pb_180 centred">
        <div class="auto-container">
            <!-- Search Form -->
            {{-- <div class="row mb-5">
                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                    <form method="GET" action="{{ route('collections') }}" class="search-form">
                        <div class="input-group">
                            <input type="text" 
                                   name="search" 
                                   class="form-control form-control-lg" 
                                   placeholder="Cari koleksi buku..." 
                                   value="{{ $searchTerm ?? '' }}"
                                   style="border-radius: 25px 0 0 25px; border: 2px solid #4A90E2; padding: 15px 20px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-lg" 
                                        type="submit" 
                                        style="border-radius: 0 25px 25px 0; background: #4A90E2; border: 2px solid #4A90E2; padding: 15px 25px;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    @if(!empty($searchTerm))
                        <div class="search-info mt-3 text-center">
                            <p class="mb-2">
                                <strong>{{ $collections->count() }}</strong> koleksi ditemukan untuk: 
                                <em>"{{ $searchTerm }}"</em>
                            </p>
                            <a href="{{ route('collections') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-times"></i> Hapus Pencarian
                            </a>
                        </div>
                    @endif
                </div>
            </div> --}}
            
            <div class="row clearfix justify-content-center">
                @forelse($collections as $index => $collection)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 team-block mb-4">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="1500ms">
                            <a href="{{ $collection->url }}" target="_blank" class="collection-item" style="text-decoration: none; color: inherit;">
                                <div class="inner-box" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                    <div class="image-box" style="overflow: hidden;">
                                        <figure class="image" style="margin: 0;">
                                            @if($collection->image)
                                                <img src="{{ asset('storage/' . $collection->image) }}" 
                                                     alt="{{ $collection->title }}"
                                                     style="width: 100%; height: 300px; object-fit: contain; background-color: #f8f9fa; transition: transform 0.3s ease;">
                                            @else
                                                <img src="https://via.placeholder.com/300x400/4A90E2/FFFFFF?text={{ urlencode($collection->title) }}" 
                                                     alt="{{ $collection->title }}"
                                                     style="width: 100%; height: 300px; object-fit: contain; background-color: #f8f9fa; transition: transform 0.3s ease;">
                                            @endif
                                        </figure>
                                    </div>
                                    <div class="lower-content" style="padding: 20px;">
                                        <h3 style="margin-bottom: 10px; font-size: 18px; line-height: 1.3;">{{ $collection->title }}</h3>
                                        <span class="designation" style="color: #666; font-size: 14px;">Lihat Koleksi <i class="fal fa-external-link ml-1"></i></span>
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
                                <p style="color: #888;">Tidak ditemukan koleksi untuk kata kunci "<em>{{ $searchTerm }}</em>"</p>
                                <a href="{{ route('collections') }}" class="btn btn-primary mt-3">Lihat Semua Koleksi</a>
                            @else
                                <i class="icon-book" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                                <h3 style="color: #666;">Belum Ada Koleksi</h3>
                                <p style="color: #888;">Koleksi buku digital sedang dalam proses pembaruan. Silakan kembali lagi nanti.</p>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        .collection-item:hover .inner-box {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        .collection-item:hover img {
            transform: scale(1.05);
        }
        .collection-item .lower-content {
            background: white;
            border-radius: 0 0 8px 8px;
        }
        .team-block-one .inner-box {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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