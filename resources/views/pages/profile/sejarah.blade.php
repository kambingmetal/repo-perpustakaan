@php
    $banner = $settingPage->banner ?? $globalSettingPage->banner;
@endphp

<x-layout.main pageTitle="Sejarah">
    <section class="page-title centred">
        @if (!empty($banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Sejarah Kami</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Sejarah Kami</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- history-section -->
    <section class="history-section">
        <div class="auto-container">
            <div class="inner-container p_relative">
                <div class="border-line"></div>
                @forelse($histories as $index => $history)
                    <div class="inner-box p_relative {{ !$loop->last ? 'mb_80' : '' }}">
                        @if($index % 2 == 0)
                            <!-- Left side layout -->
                            <span class="year">{{ $history->year }}</span>
                            <div class="content-box">
                                <h3>{{ $history->title }}</h3>
                                <p>{{ $history->description }}</p>
                            </div>
                        @else
                            <!-- Right side layout -->
                            <div class="content-box">
                                <h3>{{ $history->title }}</h3>
                                <p>{{ $history->description }}</p>
                            </div>
                            <span class="year">{{ $history->year }}</span>
                        @endif
                    </div>
                @empty
                    <div class="inner-box p_relative">
                        <div class="content-box text-center">
                            <h3>Belum Ada Data Sejarah</h3>
                            <p>Data sejarah belum tersedia. Silakan tambahkan data melalui admin panel.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- history-section end -->
</x-layout.main>