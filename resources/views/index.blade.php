<x-layout.main pageTitle="Beranda">
    <!-- main-content -->
        <x-layout.home.slider :sliders="$sliders" :heroContents="$heroContents" />


        <!-- feature-section -->
        <section class="feature-section">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="feature-block-one">
                        <div class="inner-box" style="min-height: 344px; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                            <div class="icon-box" style="position: relative;">
                                <div class='r-hex'><div class='r-hex-inner'></div></div>
                                @if ($globalSettingPage->icon_image_opac)
                                    <img src="{{ asset('storage/' . $globalSettingPage->icon_image_opac) }}" alt="OPAC Icon" 
                                         style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); 
                                                width: 50px; height: 50px; object-fit: contain; z-index: 10;">
                                @else
                                    <div class="icon"><i class="icon-4"></i></div>
                                @endif
                            </div>
                            <h3 style="font-size: 42px; margin-top:30px; text-align: start;"><a href="{{ $globalSettingPage->opac_url ?? "#" }}" class="py-4">OPAC</a></h3>
                        </div>
                    </div>
                    <div class="feature-block-one">
                        <div class="inner-box" style="min-height: 344px; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                            <div class="icon-box" style="position: relative;">
                                <div class='r-hex'><div class='r-hex-inner'></div></div>
                                @if ($globalSettingPage->icon_image_repository)
                                    <img src="{{ asset('storage/' . $globalSettingPage->icon_image_repository) }}" alt="Repository Icon" 
                                         style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); 
                                                width: 50px; height: 50px; object-fit: contain; z-index: 10;">
                                @else
                                    <div class="icon"><i class="icon-5"></i></div>
                                @endif
                            </div>
                            <h3 style="font-size: 42px; margin-top:30px; text-align: start;"><a href="{{ $globalSettingPage->repository_url ?? "#" }}" class="py-4">Repository</a></h3>
                        </div>
                    </div>
                    <div class="feature-block-one">
                        <div class="inner-box" style="text-align: center; min-height: 344px; display: flex; flex-direction: column; justify-content: center;">
                            <div class="bg-layer" style="background-image: url({{ asset('assets/images/back-hours.png') }}); opacity:1; width:125%"></div>
                            <h3><a href="index.html">Library Hours</a></h3>
                            <p>Our library is open to serve you on :</p>
                            @foreach($serviceHours as $hour)
                                <p><strong>{{ $hour->day . ($hour->end_day ? ' - ' . $hour->end_day : '') }}</strong> : 
                                    @if($hour->is_closed)
                                        Closed
                                    @else
                                        {{ date('g:i A', strtotime($hour->open_time)) }} - {{ date('g:i A', strtotime($hour->close_time)) }}
                                    @endif
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-section end -->


        <x-layout.home.profile :profile="$profileCompany" />

        <x-layout.home.statistic :statistics="$statistics"/>

        <x-layout.home.collection :collections="$collections" />

        <x-layout.home.partner :partners="$partners" />

        <x-layout.home.galeri :galeries="$galeries" />

        <x-layout.home.information :informations="$informations"/>
</x-layout.main>