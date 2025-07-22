@extends('layout.app')
@section('content')
    <form action={{route('posts.store')}} method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
    @csrf

    <h2 class="text-2xl font-semibold text-gray-800">Create New Post</h2>

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            placeholder="Enter post title"
            class=" p-2 mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            required
        >
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
        <textarea
            name="content"
            id="content"
            rows="5"
            placeholder="Write your content here..."
            class=" p-2 mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            required
        ></textarea>
    </div>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
        <input
            type="file"
            name="image"
            id="image"
            class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0 file:text-sm file:font-semibold
                   file:bg-indigo-50 file:text-indigo-700
                   hover:file:bg-indigo-100"
        >
    </div>

    <div>
        <button
            type="submit"
            class="w-full py-3 px-6 text-white font-semibold bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
            Create Post
        </button>
    </div>
</form>

@endsection