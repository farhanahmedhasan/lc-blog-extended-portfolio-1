<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src={{!$post->thumbnail ? "/images/illustration-1.png" : "/storage/".$post->thumbnail}} alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <a href="/?author={{$post->author->username}}">
                                <h5 class="font-bold">{{$post->author->name}}</h5>
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="flex items-center space-x-2 mt-8 px-2">
                            <div class="text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
                            </div>
                            <p class="text-sm">447</p>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>

                {{--Comment Section--}}
                    <section class="col-span-12 !mt-12 space-y-8">
                        @auth
                            <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border border-gray-200 p-6 rounded-xl">
                                @csrf

                                <header class="flex items-center">
                                    <img class="block rounded-full" src="https://i.pravatar.cc/40?u={{auth()->user()->id}}" width="40" height="40" alt="">
                                    <h3 class="ml-3">Want to participate</h3>
                                </header>

                                <div class="mt-6">
                                    <textarea name="body" id="body" rows="5" class="border border-gray-200 w-full p-4 text-sm focus:outline-none focus:ring " placeholder="Want anything to say?"></textarea>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white uppercase font-semibold text-xs py-2 px-10 rounded-full">Post</button>
                                </div>
                            </form>
                        @else
                            <p class="semi-bold">
                                <a href="/register" class="cursor-pointer hover:underline">Register</a> Or
                                <a href="/login" class="cursor-pointer hover:underline">Login</a> to leave a comment.
                            </p>
                        @endauth

                    @foreach($post->comments as $comment)
                        <x-post-comment :comment="$comment"/>
                    @endforeach
                </section>
            </article>

        </main>
    </section>

</x-layout>
