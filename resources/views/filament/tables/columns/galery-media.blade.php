@php
    $record = $getRecord();
@endphp

@if($record->is_video)
    @php
        // Extract YouTube ID from URL
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $record->youtube_link, $matches);
        $youtubeId = $matches[1] ?? '';
    @endphp
    @if($youtubeId)
        <iframe 
            width="200" 
            height="113" 
            src="https://www.youtube.com/embed/{{ $youtubeId }}" 
            frameborder="0" 
            allowfullscreen
        ></iframe>
    @else
        <span class="text-gray-500">Invalid YouTube URL</span>
    @endif
@else
    @if($record->image)
        <img 
            src="{{ Storage::disk('public')->url($record->image) }}" 
            alt="{{ $record->title }}"
            class="h-20 rounded"
            width="100p"
        />
    @else
        <span class="text-gray-500">No image</span>
    @endif
@endif
