@php
    use App\Models\Team;
    $teamMembers = Team::orderBy('order', 'asc')->get();
@endphp

<x-layout.main pageTitle="Tim">
    <section class="page-title centred">
        @if (!empty($settingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $settingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Tim Kami</h2>
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li>-</li>
                    <li>Tim Kami</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-section pt_120 pb_180 centred">
        <div class="auto-container">
            <div class="sec-title mb_70 sec-title-animation animation-style2">
                <h2 class="title-animation">Tim Expert Kami</h2>
            </div>
            <div class="row clearfix justify-content-center">
                @forelse($teamMembers as $index => $member)
                    <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="{{ $index * 200 }}ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        @if($member->foto)
                                            <img src="{{ asset('storage/' . $member->foto) }}" alt="{{ $member->nama }}">
                                        @else
                                            <img src="/assets/images/team/team-1.jpg" alt="{{ $member->nama }}">
                                        @endif
                                    </figure>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="#">{{ $member->nama }}</a></h3>
                                    <span class="designation">{{ $member->role }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="mb-0">Belum ada data tim yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout.main>