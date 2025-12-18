<!-- main-footer -->
<footer class="main-footer alternat-2">
    @if($globalSettingPage->footer_banner)
        <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->footer_banner) }});"></div>
    @else
        <div class="bg-layer" style="background-image: url(assets/images/background/footer-bg.jpg);"></div>
    @endif
    <div class="auto-container">
        <div class="footer-top">
            <div class="top-inner">
                <figure class="footer-logo">
                    @if($globalProfile->image)
                        <img style="width: 182px; height: 50px;" src="{{ asset('storage/' . $globalProfile->image) }}" alt="{{ $globalProfile->title }}">
                    @else
                        <img style="width: 182px; height: 50px;" src="/assets/images/logo.png" alt="{{ $globalProfile->title }}">
                    @endif
                </figure>
                <ul class="footer-menu">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile.sejarah') }}">Tentang</a></li>
                    <li><a href="{{ route('profile.tim') }}">Tim</a></li>
                    <li><a href="{{ route('layanan.jenis-layanan') }}">Layanan</a></li>
                    <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="widget-section">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>Tentang Kami</h3>
                        </div>
                        <div class="widget-content">
                            <p>{!! substr($globalProfile->description, 0, 200) . '... <a href="#profile">Read More</a>' ?: 'Perpustakaan yang menyediakan berbagai layanan dan fasilitas untuk mendukung kegiatan belajar dan penelitian.' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml_80">
                        <div class="widget-title">
                            <h3>Kontak Kami</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info clearfix">
                                @if($globalProfile->email)
                                    <li><i class="fas fa-envelope" style="color: white; margin-right: 10px;"></i><a href="mailto:{{ $globalProfile->email }}" style="color: white;">{{ $globalProfile->email }}</a></li>
                                @endif
                                @if($globalProfile->phone)
                                    <li><i class="fas fa-phone" style="color: white; margin-right: 10px;"></i><a href="tel:{{ $globalProfile->phone }}" style="color: white;">{{ $globalProfile->phone }}</a></li>
                                @endif
                                @if($globalProfile->address)
                                    <li><i class="fas fa-map-marker-alt" style="color: white; margin-right: 10px;"></i><span style="color: white;">{{ $globalProfile->address }}</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>Resources</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#">Koleksi</a></li>
                                <li><a href="#">Galeri</a></li>
                                <li><a href="#">Informasi</a></li>
                                <li><a href="#">Berita</a></li>
                                <li><a href="#">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget footer-bottom" style="padding-top: 0;">
                        <div class="widget-title">
                            <h3>Statistik Pengunjung</h3>
                        </div>
                        <div class="widget-content">
                            <div class="visitor-stats" style="margin-bottom: 20px;">
                                <ul class="stats-list" style="list-style: none; padding: 0; color: white;">
                                    <li style="margin-bottom: 8px;"><i class="fas fa-eye" style="margin-right: 8px; color: #ffd700;"></i>Total: <strong>{{ number_format($visitorStats['total_visits'] ?? 0) }}</strong></li>
                                    <li style="margin-bottom: 8px;"><i class="fas fa-calendar-day" style="margin-right: 8px; color: #ffd700;"></i>Hari Ini: <strong>{{ number_format($visitorStats['today_visits'] ?? 0) }}</strong></li>
                                    <li style="margin-bottom: 8px;"><i class="fas fa-calendar-week" style="margin-right: 8px; color: #ffd700;"></i>Minggu Ini: <strong>{{ number_format($visitorStats['week_visits'] ?? 0) }}</strong></li>
                                    <li style="margin-bottom: 8px;"><i class="fas fa-calendar-alt" style="margin-right: 8px; color: #ffd700;"></i>Bulan Ini: <strong>{{ number_format($visitorStats['month_visits'] ?? 0) }}</strong></li>
                                </ul>
                            </div>
                            <div class="widget-title">
                                <h3>Follow Us On</h3>
                            </div>
                            <ul class="social-links">
                                @if($globalProfile->social_media && count($globalProfile->social_media) > 0)
                                    @foreach($globalProfile->social_media as $social)
                                        <li><a href="{{ $social['url'] }}" target="_blank" title="{{ $social['name'] }}"><i class="{{ $social['icon'] }}"></i></a></li>
                                    @endforeach
                                @else
                                    {{-- Default social links if none configured --}}
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="text-align: center;">
            <div class="bottom-inner">
                <div class="copyright"><p>Copyright &copy; 2025 <a href="{{ route('home') }}">{{ $globalProfile->title }}</a>. All Rights Reserved</p></div>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->



<!--Scroll to top-->
<div class="scroll-to-top">
    <svg class="scroll-top-inner" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>