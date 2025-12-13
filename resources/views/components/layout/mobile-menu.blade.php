<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo">
            <a href="{{ route('home') }}">
                @if($globalProfile->image)
                    <img src="{{ asset('storage/' . $globalProfile->image) }}" alt="{{ $globalProfile->title }}" title="{{ $globalProfile->title }}">
                @else
                    <img src="/assets/images/logo.png" alt="{{ $globalProfile->title }}" title="{{ $globalProfile->title }}">
                @endif
            </a>
        </div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                @if($globalProfile->email)
                    <li><a href="mailto:{{ $globalProfile->email }}">{{ $globalProfile->email }}</a></li>
                @endif
                @if($globalProfile->phone)
                    <li><a href="tel:{{ $globalProfile->phone }}">{{ $globalProfile->phone }}</a></li>
                @endif
                @if(!$globalProfile->email && !$globalProfile->phone)
                    <li>Hubungi kami untuk informasi lebih lanjut</li>
                @endif
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                @if($globalProfile->social_media && count($globalProfile->social_media) > 0)
                    @foreach($globalProfile->social_media as $social)
                        <li><a href="{{ $social['url'] }}" target="_blank" title="{{ $social['name'] }}"><span class="{{ $social['icon'] }}"></span></a></li>
                    @endforeach
                @else
                    {{-- Default social links if none configured --}}
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->