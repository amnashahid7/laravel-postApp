<header class="sticky top-0 z-50 bg-white shadow-md px-4 py-3 flex items-center justify-between mb-5">

    <a href="{{ url('/') }}" class="text-3xl font-bold text-blue-900">
        PostApp
    </a>

    <nav class="space-x-4 hidden md:block">
      
          <a href={{route('posts.create')}} class="text-gray-700 hover:text-blue-900">Create Post</a>
    </nav>

    <button class="md:hidden text-gray-700" onclick="document.getElementById('mobile-nav').classList.toggle('hidden')">
        ☰
    </button>

    <div id="mobile-nav" class="absolute top-16 left-0 right-0 bg-white shadow-md p-4 space-y-2 hidden md:hidden">
       
         <a href={{route('posts.create')}} class="text-gray-700 hover:text-blue-900">Create Post</a>
    </div>
</header>
