@if (session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(()=> show = false, 4000)"
         x-show="show"
         class="fixed bottom-3 right-3 px-4 py-2 text-xs text-white bg-blue-500 rounded">
        <p>{{ session('success') }}</p>
    </div>
@endif()

@if (session()->has('failed'))
    <div x-data="{show: true}"
         x-init="setTimeout(()=> show = false, 4000)"
         x-show="show"
         class="fixed bottom-3 right-3 px-4 py-2 text-xs text-white bg-red-500 rounded">
        <p>{{ session('failed') }}</p>
    </div>
@endif()
