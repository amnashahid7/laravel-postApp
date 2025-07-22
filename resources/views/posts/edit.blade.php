@extends('layout.app')

<style>
#fullscreenPreview {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0,0,0,0.8);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}
#fullscreenPreview img {
    max-width: 90%;
    max-height: 90%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
    border-radius: 8px;
}
</style>


@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow-md rounded-lg space-y-6">
        <h2 class="text-xl font-bold text-gray-800">Edit Post</h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block font-semibold mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>

            <!-- Content -->
            <div>
                <label class="block font-semibold mb-1">Content</label>
                <textarea name="content" rows="4"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Current Image -->
            @if ($post->image)
                <div>
                    <label class="block font-semibold mb-1">Current Image</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" id="imagePrevious" class="w-48 rounded shadow">
                </div>
            @endif

            <!-- Upload New Image -->
            <div>
                <label class="block font-semibold mb-1">Select New Image</label>
                <input type="file" name="image" id="imageInput" accept="image/*" class="w-full text-sm">
            </div>

            <!-- Preview Area -->
            <div class="mt-4">
                <p class="font-medium text-sm text-gray-600">Image Preview:</p>
                <img id="imagePreview" src="#" alt="Preview"
                    class="mt-2 w-48 h-auto rounded shadow hidden cursor-pointer">
            </div>

            <!-- Fullscreen Preview Overlay -->
            <div id="fullscreenPreview" onclick="this.style.display='none'">
                <img src="#" alt="Full View">
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update
                Post</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("imageInput");
            const preview = document.getElementById("imagePreview");
               const previous = document.getElementById("imagePrevious");
            const fullscreen = document.getElementById("fullscreenPreview");
            const fullscreenImg = fullscreen.querySelector("img");

            input.addEventListener("change", function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "#";
                    preview.classList.add("hidden");
                }
            });

            // Show full screen on click
            preview.addEventListener("click", function() {
                if (preview.src && !preview.classList.contains("hidden")) {
                    fullscreenImg.src = preview.src;
                    fullscreen.style.display = "flex";
                }
            });

            previous.addEventListener("click",function(){
                fullscreenImg.src = previous.src;
                    fullscreen.style.display = "flex";
            })
        });
    </script>
@endsection
