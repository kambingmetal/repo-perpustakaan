<x-layout.main pageTitle="Jenis Layanan">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Jenis Layanan</h2>
                <ul class="bread-crumb">
                    <li>Informasi jenis layanan yang kami sediakan</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- service-section -->
    <section class="service-section pt_120 pb_90">
        <div class="shape">
            <div class="shape-1" style="background-image: url(/assets/images/shape/shape-55.png);"></div>
            <div class="shape-2" style="background-image: url(/assets/images/shape/shape-34.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                @forelse($serviceTypes as $serviceType)
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <div class='r-hex'><div class='r-hex-inner'></div></div>
                                    <div class="icon"><i class="{{ $serviceType->icon_class }}"></i></div>
                                </div>
                                <h3>{{ $serviceType->name }}</h3>
                                <p>{{ $serviceType->description ?: 'Deskripsi layanan belum tersedia.' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="icon-box mb-4">
                                <i class="icon-12" style="font-size: 48px; color: #ccc;"></i>
                            </div>
                            <h3 class="mb-3">Belum Ada Jenis Layanan</h3>
                            <p class="text-muted">Jenis layanan sedang dalam proses pengembangan dan akan segera tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- service-section end -->
</x-layout.main>