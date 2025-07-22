<footer class="fixed bottom-0 w-full bg-gray-100 text-gray-900 py-4 shadow-md mt-5" >

    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
        <div class="mb-4 md:mb-0">
            <h2 class="text-3xl font-semibold text-blue-900">Post App</h2>
            <p class="text-sm">© {{ date('Y') }} Post App. All rights reserved.</p>
        </div>

        <div class="space-x-4">
            {{-- <a href="{{ route('posts.index') }}" class="hover:text-blue-900">Posts</a>
            <a href="{{ route('posts.create') }}" class="hover:text-blue-900">Create</a>
            <a href="#" class="hover:text-blue-900">Contact</a> --}}
             <a href="/" class="text-gray-900 hover:text-blue-900">Create Post</a>
        </div>
    </div>
</footer>
