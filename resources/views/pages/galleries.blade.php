<x-layout.main pageTitle="Galeri">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Galeri</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Galeri</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-section pt_70 pb_180 centred">
        <div class="auto-container">
            <div class="row clearfix justify-content-center">
                @forelse($galeries as $index => $galery)
                    <x-gallery.gallery-item :gallery="$galery" :index="$index" />
                @empty
                    <div class="col-12 text-center">
                        <div class="empty-state py-5">
                            <i class="fas fa-images" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                            <h3 style="color: #666;">Belum Ada Galeri</h3>
                            <p style="color: #888;">Galeri foto dan video sedang dalam proses pembaruan. Silakan kembali lagi nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <x-gallery.gallery-modal />
</x-layout.main>