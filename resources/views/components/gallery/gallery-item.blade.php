@props([
    'gallery',
    'index' => 0,
    'classCol' => 'col-lg-3 col-md-6 col-sm-12'
])

<div class="{{ $classCol }} research-block" style="height: fit-content;">
    <div class="research-block-one">
        <div class="inner-box gallery-item" 
             data-bs-toggle="modal" 
             data-bs-target="#galleryModal"
             @if($gallery->is_video)
                 @php
                     // Extract YouTube video ID from various URL formats
                     $youtube_id = '';
                     if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $gallery->youtube_link, $matches)) {
                         $youtube_id = $matches[1];
                     } else {
                         // If it's already just an ID
                         $youtube_id = $gallery->youtube_link;
                     }
                 @endphp
                 data-video="true"
                 data-youtube-id="{{ $youtube_id }}"
             @else
                 data-video="false"
                 data-image="{{ asset('storage/'.$gallery->image) }}"
             @endif
             data-title="{{ $gallery->title }}"
             style="cursor: pointer;">
            <div class="image-box">
                @if($gallery->is_video)
                    @php
                        // Extract YouTube video ID from various URL formats
                        $youtube_id = '';
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $gallery->youtube_link, $matches)) {
                            $youtube_id = $matches[1];
                        } else {
                            // If it's already just an ID
                            $youtube_id = $gallery->youtube_link;
                        }
                    @endphp
                    <figure class="overlay-image">
                        <img src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" alt="{{ $gallery->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                    </figure>
                    <figure class="image">
                        <img src="https://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg" alt="{{ $gallery->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                    </figure>
                    <div class="play-button">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    @if($gallery->category)
                        <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background: rgba(74, 144, 226, 0.95); color: white; padding: 6px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; z-index: 4; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                            {{ $gallery->category->name }}
                        </div>
                    @endif
                @else
                    <figure class="overlay-image">
                        <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                    </figure>
                    <figure class="image">
                        <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                    </figure>
                    @if($gallery->category)
                        <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background: rgba(74, 144, 226, 0.95); color: white; padding: 6px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; z-index: 4; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                            {{ $gallery->category->name }}
                        </div>
                    @endif
                @endif
            </div>
            <div class="overlay-content">
                <div class="zoom-icon">
                    @if($gallery->is_video)
                        <i class="fas fa-play"></i>
                    @else
                        <i class="fas fa-search-plus"></i>
                    @endif
                </div>
            </div>
            <div class="text-box">
                <h3><a>{{ $gallery->title }}</a></h3>
            </div>
        </div>
    </div>
</div>