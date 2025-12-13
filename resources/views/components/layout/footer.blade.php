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
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
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
                            <p>{{ $globalProfile->description ?: 'Perpustakaan yang menyediakan berbagai layanan dan fasilitas untuk mendukung kegiatan belajar dan penelitian.' }}</p>
                            <ul class="info clearfix">
                                @if($globalProfile->email)
                                    <li><a href="mailto:{{ $globalProfile->email }}">{{ $globalProfile->email }}</a></li>
                                @endif
                                @if($globalProfile->phone)
                                    <li><a href="tel:{{ $globalProfile->phone }}">{{ $globalProfile->phone }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    {{-- <div class="footer-widget links-widget ml_80">
                        <div class="widget-title">
                            <h3>Quick Link</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="{{ route('profile.sejarah') }}">Tentang Perusahaan</a></li>
                                <li><a href="{{ route('profile.sejarah') }}">Sejarah Kami</a></li>
                                <li><a href="#">Layanan</a></li>
                                <li><a href="#">Fasilitas</a></li>
                                <li><a href="{{ route('profile.tim') }}">Tim Kami</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    {{-- <div class="footer-widget links-widget">
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
                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget footer-bottom">
                        <div class="widget-title">
                            <h3>Follow Us On</h3>
                        </div>
                        <div class="widget-content">
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
        <div class="footer-bottom">
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