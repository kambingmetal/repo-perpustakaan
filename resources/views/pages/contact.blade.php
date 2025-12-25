<x-layout.main pageTitle="Hubungi Kami">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});">
            </div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Kontak Kami</h2>
                <ul class="bread-crumb">
                    <li>Informasi Kontak dan Lokasi Kami</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-info-section pt_120 pb_90 centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="r-hex">
                                    <div class="r-hex-inner"></div>
                                </div>
                                <div class="icon"><i class="icon-67"></i></div>
                            </div>
                            <h3>Lokasi Kami</h3>
                            <p>{!! $globalProfile->address ? nl2br(e($globalProfile->address)) : 'Alamat belum diatur' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="r-hex">
                                    <div class="r-hex-inner"></div>
                                </div>
                                <div class="icon"><i class="icon-68"></i></div>
                            </div>
                            <h3>Alamat Email</h3>
                            @if($globalProfile->email)
                                <p><a href="mailto:{{ $globalProfile->email }}">{{ $globalProfile->email }}</a></p>
                            @else
                                <p>Email belum diatur</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="r-hex">
                                    <div class="r-hex-inner"></div>
                                </div>
                                <div class="icon"><i class="icon-69"></i></div>
                            </div>
                            <h3>Nomor Telepon</h3>
                            @if($globalProfile->phone)
                                <p><a href="tel:{{ $globalProfile->phone }}">{{ $globalProfile->phone }}</a></p>
                            @else
                                <p>Nomor telepon belum tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.709519887359!2d140.6525742!3d-2.6004941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c604000000001%3A0x45ad6896a73ea040!2sPoliteknik%20Kesehatan%20Jayapura!5e0!3m2!1sid!2sid!4v1766667535823!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- contact-section -->
    <section class="contact-section pt_120 pb_180" id="contact-form-section">
        
        {{-- Custom CSS for Error Handling --}}
        <style>
            .form-group .is-invalid {
                border-color: #dc3545 !important;
                box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
            }
            
            .invalid-feedback {
                display: block !important;
                color: #dc3545 !important;
                font-size: 0.875rem !important;
                margin-top: 0.25rem !important;
                font-weight: 500 !important;
            }
            
            .alert-danger {
                background-color: #f8d7da !important;
                border-color: #f5c6cb !important;
                color: #721c24 !important;
            }
            
            .alert-success {
                background-color: #d4edda !important;
                border-color: #c3e6cb !important;
                color: #155724 !important;
            }
            
            .form-group input.is-invalid:focus,
            .form-group textarea.is-invalid:focus {
                border-color: #dc3545 !important;
                box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
            }
            
            /* Responsive Google Maps */
            .map-responsive {
                position: relative;
                padding-bottom: 37.5%; /* 16:6 aspect ratio */
                height: 0;
                overflow: hidden;
                margin-top: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            
            .map-responsive iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
                border: 0;
            }
            
            @media (max-width: 768px) {
                .map-responsive {
                    padding-bottom: 56.25%; /* 16:9 aspect ratio for mobile */
                }
            }
        </style>
        
        <div class="auto-container">
            <div class="sec-title centred mb_70 sec-title-animation animation-style2">
                <span class="sub-title mb_20 title-animation">Kirim Pesan</span>
                <h2 class="title-animation">Hubungi Kami</h2>
            </div>
            
            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert" style="border-left: 4px solid #28a745;">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- Global Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4 shadow-sm" role="alert" style="border-left: 4px solid #dc3545; background-color: #f8d7da; color: #721c24;">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Oops!</strong> Ada beberapa masalah dengan data yang Anda masukkan:
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach ($errors->all() as $error)
                            <li style="color: #721c24;">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="form-inner">
                <form method="POST" action="{{ route('contact.store') }}" id="contact-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" 
                                   name="name" 
                                   placeholder="Nama Anda" 
                                   value="{{ old('name') }}" 
                                   class="@error('name') is-invalid @enderror"
                                   required>
                            @error('name')
                                <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="email" 
                                   name="email" 
                                   placeholder="Email Anda" 
                                   value="{{ old('email') }}" 
                                   class="@error('email') is-invalid @enderror"
                                   required>
                            @error('email')
                                <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" 
                                   name="phone" 
                                   placeholder="Telepon" 
                                   value="{{ old('phone') }}" 
                                   class="@error('phone') is-invalid @enderror"
                                   required>
                            @error('phone')
                                <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" 
                                   name="subject" 
                                   placeholder="Subjek" 
                                   value="{{ old('subject') }}" 
                                   class="@error('subject') is-invalid @enderror"
                                   required>
                            @error('subject')
                                <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="message" 
                                      placeholder="Tulis pesan" 
                                      class="@error('message') is-invalid @enderror"
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback" style="display: block; color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                            <button type="submit" class="theme-btn" name="submit-form">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pertanyaan
                                <span></span><span></span><span></span><span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- contact-section end -->
</x-layout.main>