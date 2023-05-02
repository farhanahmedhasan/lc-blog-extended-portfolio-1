<x-dropdown>

    <x-slot name="trigger">
        <button class="flex lg:inline-flex py-2 pl-3 pr-9 text-left text-sm font-semibold w-full lg:w-32">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"}}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: -12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="!isset($currentCategory)">
        All
    </x-dropdown-item>

    @foreach($categories as $category)
        <x-dropdown-item
            href="?category={{$category->slug}}&{{http_build_query(request()->except('category' , 'page'))}}"
            :active="isset($currentCategory) && $currentCategory->is($category)"
        >
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
