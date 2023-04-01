@props(['comment'])

<article class="flex bg-gray-50 p-6 border border-gray-200 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img class="block rounded-full" src="https://i.pravatar.cc/60?u={{$comment->id}}" width="60" height="60" alt="">
    </div>

                        <div>
                            <header class="mb-2">
                                <h3 class="font-bold">{{$comment->author->name}}</h3>

                                <p class="text-xs">
                                    Posted
                                    <time>{{$comment->created_at->diffForHumans()}}</time>
                                </p>
                            </header>

                            <div class="space-y-2">
                                {!! $comment->body !!}
                            </div>
                        </div>
                    </article>
