@extends('layout.app') 
@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="flex justify-between mb-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit Post</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">Delete Post</button>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-64 object-cover">
        @endif
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
            <p class="text-gray-700 text-lg leading-relaxed">{{ $post->content }}</p>
        </div>
    </div>
</div>
@endsection
