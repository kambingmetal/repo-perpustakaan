@if($getRecord()->is_video && $getRecord()->youtube_link)
    <div class="flex items-center space-x-2">
        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
        </svg>
        <span class="text-sm text-gray-600">YouTube Video</span>
    </div>
@elseif($getRecord()->image)
    <img src="{{ asset('storage/' . $getRecord()->image) }}" 
         alt="{{ $getRecord()->title }}" 
         class="w-12 h-12 object-cover rounded">
@else
    <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
    </div>
@endif