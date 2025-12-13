@props([
    'galeries',
    'setting_page'
])

<!-- research-section -->
<section class="research-section pt_120 pb_90">
    @if ($globalSettingPage->image_gallery)
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{ asset('storage/' . $globalSettingPage->image_gallery) }});"></div>
    @else
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/research-bg.jpg);"></div>
    @endif
    <div class="auto-container">
        <div class="inner-container p_relative z_5">
            <div class="sec-title light centred mb_70 sec-title-animation animation-style2">
                <h2 class="title-animation">{{ $globalSettingPage->title_gallery }}</h2>
                <h4 class="sub-title-animation" style="color: white">{{ $globalSettingPage->subtitle_gallery }}</h4>
            </div>
            <div class="row clearfix justify-content-center">
                @foreach($galeries as $galery)
                    <div class="col-lg-3 col-md-6 col-sm-12 research-block">
                        <div class="research-block-one">
                            <div class="inner-box gallery-item" 
                                 data-bs-toggle="modal" 
                                 data-bs-target="#galleryModal"
                                 @if($galery->is_video)
                                     @php
                                         // Extract YouTube video ID from various URL formats
                                         $youtube_id = '';
                                         if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $galery->youtube_link, $matches)) {
                                             $youtube_id = $matches[1];
                                         } else {
                                             // If it's already just an ID
                                             $youtube_id = $galery->youtube_link;
                                         }
                                     @endphp
                                     data-video="true"
                                     data-youtube-id="{{ $youtube_id }}"
                                 @else
                                     data-video="false"
                                     data-image="{{ asset('storage/'.$galery->image) }}"
                                 @endif
                                 data-title="{{ $galery->title }}"
                                 style="cursor: pointer;">
                                <div class="image-box">
                                    @if($galery->is_video)
                                        @php
                                            // Extract YouTube video ID from various URL formats
                                            $youtube_id = '';
                                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $galery->youtube_link, $matches)) {
                                                $youtube_id = $matches[1];
                                            } else {
                                                // If it's already just an ID
                                                $youtube_id = $galery->youtube_link;
                                            }
                                        @endphp
                                        <figure class="overlay-image">
                                            <img src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" alt="{{ $galery->title }}">
                                        </figure>
                                        <figure class="image">
                                            <img src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" alt="{{ $galery->title }}">
                                        </figure>
                                        <div class="play-button">
                                            <i class="fas fa-play-circle"></i>
                                        </div>
                                    @else
                                        <figure class="overlay-image"><img src="{{ asset('storage/'.$galery->image) }}" alt="{{ $galery->title }}"></figure>
                                        <figure class="image"><img src="{{ asset('storage/'.$galery->image) }}" alt="{{ $galery->title }}"></figure>
                                    @endif
                                </div>
                                <div class="overlay-content">
                                    <div class="zoom-icon">
                                        @if($galery->is_video)
                                            <i class="fas fa-play"></i>
                                        @else
                                            <i class="fas fa-search-plus"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-box">
                                    <h3><a>{{ $galery->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="galleryModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div id="imageContainer" style="display: none;">
                    <img id="modalImage" src="" alt="" class="img-fluid rounded shadow" style="max-height: 70vh; max-width: 100%; object-fit: contain;">
                </div>
                <div id="videoContainer" style="display: none;">
                    <div class="ratio ratio-16x9">
                        <iframe id="modalVideo" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for Gallery Modal -->
<style>
    .gallery-item {
        position: relative !important;
        cursor: pointer !important;
        z-index: 1 !important;
    }
    
    .research-block-one .inner-box {
        position: relative;
        overflow: hidden;
    }
    
    .research-block-one .overlay-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 3;
        pointer-events: none; /* Allow click through overlay */
    }
    
    .gallery-item:hover .overlay-content {
        opacity: 1;
    }
    
    .research-block-one .zoom-icon {
        color: white;
        font-size: 24px;
        background: rgba(255, 255, 255, 0.2);
        padding: 15px;
        border-radius: 50%;
        border: 2px solid white;
        transition: all 0.3s ease;
        pointer-events: none;
    }
    
    .gallery-item:hover .zoom-icon {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.1);
    }
    
    .gallery-item img {
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .gallery-item .text-box {
        pointer-events: none; /* Prevent text from blocking clicks */
    }
    
    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 48px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        z-index: 2;
        pointer-events: none;
    }
    
    .play-button i {
        filter: drop-shadow(0 0 10px rgba(0,0,0,0.8));
    }
    
    #galleryModal .modal-content {
        background: white !important;
        border-radius: 8px !important;
        border: none !important;
    }
    
    #galleryModal .modal-header {
        border-bottom: 1px solid #dee2e6 !important;
        padding: 1rem !important;
    }
    
    #galleryModal .modal-body {
        padding: 1.5rem !important;
        background: #f8f9fa !important;
    }
    
    #galleryModal .btn-close {
        opacity: 0.8;
    }
    
    #galleryModal .btn-close:hover {
        opacity: 1;
    }
    
    .row.justify-content-center {
        display: flex;
        justify-content: center;
    }
</style>

<!-- JavaScript for Gallery Modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryModal = document.getElementById('galleryModal');
    const modalImage = document.getElementById('modalImage');
    const modalVideo = document.getElementById('modalVideo');
    const modalTitle = document.getElementById('galleryModalLabel');
    const imageContainer = document.getElementById('imageContainer');
    const videoContainer = document.getElementById('videoContainer');
    
    if (galleryModal) {
        galleryModal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget;
            const isVideo = trigger.getAttribute('data-video') === 'true';
            const title = trigger.getAttribute('data-title');
            
            modalTitle.textContent = title;
            
            if (isVideo) {
                const youtubeId = trigger.getAttribute('data-youtube-id');
                const embedUrl = `https://www.youtube.com/embed/${youtubeId}?autoplay=1`;
                
                modalVideo.src = embedUrl;
                imageContainer.style.display = 'none';
                videoContainer.style.display = 'block';
            } else {
                const imageUrl = trigger.getAttribute('data-image');
                
                modalImage.src = imageUrl;
                modalImage.alt = title;
                videoContainer.style.display = 'none';
                imageContainer.style.display = 'block';
            }
        });
        
        // Clean up when modal is hidden
        galleryModal.addEventListener('hidden.bs.modal', function () {
            modalVideo.src = '';
            modalImage.src = '';
        });
        
        // Close modal on image click (optional)
        modalImage.addEventListener('click', function() {
            const modal = bootstrap.Modal.getInstance(galleryModal);
            if (modal) modal.hide();
        });
    }
});
</script>
<!-- research-section end -->