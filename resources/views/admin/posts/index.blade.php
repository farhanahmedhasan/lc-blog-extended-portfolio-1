<x-layout>
	<x-settings heading="All Posts">
		
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <tbody>
			@foreach($posts as $post)
				<tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<a href="/posts/{{$post->slug}}">
							{{ $post->title }}
						</a>
					</th>
					<td class="px-6 py-4">
						<a href="/admin/posts/{{$post->slug}}/edit" class="font-medium text-blue-600 hover:underline">Edit</a>
					</td>
					<td class="px-6 py-4">
						<form action="/admin/posts/{{$post->slug}}" method="POST">
							@csrf
							@method('DELETE')
							<button class="font-medium text-red-600 hover:underline">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
        </tbody>
    </table>
</div>

	</x-settings>
</x-layout>
