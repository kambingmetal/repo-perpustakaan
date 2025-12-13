<x-layout.main pageTitle="Beranda">
    <!-- main-content -->
        <x-layout.home.slider :sliders="$sliders" />


        <!-- feature-section -->
        <section class="feature-section">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class='r-hex'><div class='r-hex-inner'></div></div>
                                <div class="icon"><i class="icon-4"></i></div>
                            </div>
                            <h3 style="font-size: 72px; margin-top:30px"><a href="index.html" class="py-4">OPAC</a></h3>
                        </div>
                    </div>
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class='r-hex'><div class='r-hex-inner'></div></div>
                                <div class="icon"><i class="icon-5"></i></div>
                            </div>
                            <h3 style="font-size: 72px; margin-top:30px"><a href="index.html" class="py-4">Repository</a></h3>
                        </div>
                    </div>
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="bg-layer" style="background-image: url({{ asset('assets/images/back-hours.png') }}); opacity:1; width:125%"></div>
                            <div class="icon-box">
                                <div class='r-hex'><div class='r-hex-inner'></div></div>
                                <div class="icon"><i class="icon-6"></i></div>
                            </div>
                            <h3><a href="index.html">24/7 Support Assistant</a></h3>
                            <p>The support assistant is available 24 hours a day, every day of the week, ensuring continuous accessibility</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-section end -->


        <x-layout.home.profile :profile="$globalProfile" />

        <x-layout.home.statistic :statistics="$statistics"/>

        <x-layout.home.collection :collections="$collections" />

        <x-layout.home.partner :partners="$partners" />

        <x-layout.home.galeri :galeries="$galeries" />

        <x-layout.home.information :informations="$informations"/>
</x-layout.main>