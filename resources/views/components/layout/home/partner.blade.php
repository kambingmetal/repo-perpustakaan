@props(['partners'])
<!-- partners-section -->
<section class="clients-section">
    <div class="outer-container">
        <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            @foreach($partners as $partner)
                <figure class="clients-logo"><a href="{{ $partner->link }}"><img src="{{ asset('storage/' . $partner->image) }}" alt=""></a></figure>
            @endforeach
        </div>
    </div>
</section>
<!-- partners-section end -->