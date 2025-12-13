<x-layout.main pageTitle="Struktur Organisasi">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Struktur Organisasi</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Struktur Organisasi</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-style-four pt_120 pb_180">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content_block_one">
                        <div class="content-box p_relative d_block">                            
                            @if($profileCompany->struktur_organisasi)
                                <div class="image-box text-center mb_30">
                                    <figure class="image">
                                        <img src="{{ asset('storage/' . $profileCompany->struktur_organisasi) }}" 
                                             alt="Struktur Organisasi {{ $profileCompany->title ?? 'Perusahaan' }}"
                                             class="img-fluid rounded shadow"
                                             style="max-width: 100%; height: auto;">
                                    </figure>
                                </div>
                            @else
                                <div class="alert alert-info text-center">
                                    <h5>Struktur Organisasi Belum Tersedia</h5>
                                    <p>Struktur organisasi sedang dalam proses pembaruan. Silakan kembali lagi nanti.</p>
                                </div>
                            @endif
                            
                            {{-- @if($profileCompany->description)
                                <div class="text">
                                    <p>{{ $profileCompany->description }}</p>
                                </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.main>