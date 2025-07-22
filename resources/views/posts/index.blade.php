



@extends('layout.app') {{-- Adjust if you're not using a layout --}}
@section('content')

<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">All Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit($post->content, 120) }}</p>

                <a href="{{ route('posts.show', $post->id) }}" class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium">
                    Read More →
                </a>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>

@endsection
