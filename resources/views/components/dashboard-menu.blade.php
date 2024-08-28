@props(['active' => false , ])

<a {{ $attributes }} class=" px-2 lg:pl-3 py-3 transition-all duration-500 block w-full  {{ $active ? "bg-slate-800 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}}">
    <span class="text-2xl transition-all duration-300 inline bi bi-list"></span> <span class="  md:inline-block transition-all duration-500" :class ="{'inline' : open, 'hidden' : !open}" > {{ $slot }}</span>
</a>
