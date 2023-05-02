@props(['post'])

<article
    {{$attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])}}>
    <div class="py-6 px-5">
        <div>
            <img src={{!$post->thumbnail ? "/images/illustration-1.png" : "/storage/".$post->thumbnail}} alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2 flex items-center justify-between">
                    <x-category-button :category="$post->category" />

                    <div class="flex items-center space-x-2">
                        <div class="text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
                        </div>
                        <p class="text-sm">{{$post->count}}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="/posts/{{$post->slug}}">
                        <h1 class="text-3xl">
                            {{$post->title}}
                        </h1>
                    </a>

                    <span class="mt-2 block text-gray-400 text-xs">
                         Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                    {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <a href="/?author={{$post->author->username}}">
                            <h5 class="text-sm font-semibold">{{$post->author->name}}</h5>
                        </a>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{$post->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
