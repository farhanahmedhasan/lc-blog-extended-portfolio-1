<x-layout>

    <section class="mt-6   max-w-lg mx-auto ">
		<h2 class="font-bold text-lg mb-4">Publish your post</h2>
		<div class="bg-gray-50 rounded-lg shadow-sm px-6 py-8">
			<form action="/admin/posts" method="post" enctype="multipart/form-data">
				@csrf

				<div class='mb-6'>
					<label for='title' class='block mb-2 uppercase font-bold text-xs text-gray-700'>
						Title
					</label>

					<input 
						class="border border-gray-400 p-2 w-full" 
						type="text" 
						name="title" 
						id="title" 
						value="{{old('title')}}"
						required />

					@error('title')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class='mb-6'>
					<label for='slug' class='block mb-2 uppercase font-bold text-xs text-gray-700'>
						Post Slug
					</label>

					<input 
						class="border border-gray-400 p-2 w-full" 
						type="text" 
						name="slug" 
						id="slug"
						value="{{old('slug')}}" 
						required />

					@error('slug')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class='mb-6'>
					<label for='thumbnail' class='block mb-2 uppercase font-bold text-xs text-gray-700'>
						Thumbnail
					</label>

					<input 
						class="border border-gray-400 p-2 w-full" 
						type="file" 
						name="thumbnail" 
						id="thumbnail"
						value="{{old('thumbnail')}}" 
						required />

					@error('thumbnail')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class='mb-6'>
					<label for='excerpt' class='block mb-2 uppercase font-bold text-xs text-gray-700'>
						Post Summary
					</label>

					<textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" cols="30" rows="4" required>{{old('excerpt')}}</textarea>

					@error('excerpt')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class='mb-6'>
					<label for='body' class='block mb-2 uppercase font-bold text-xs text-gray-700'>
						Post Body
					</label>

					<textarea class="border border-gray-400 p-2 w-full" name="body" id="body" cols="30" rows="10" required>{{old('body')}}</textarea>

					@error('body')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class='mb-6'>
					<label for='category_id' class='block mb-2 uppercase font-bold text-xs text-gray-700'>
						Select Category
					</label>

					<select name="category_id" id="category_id">
						@foreach (\App\Models\Category::all() as $category)
							<option 
								value="{{ $category->id }}" 
								{{old('category_id') == $category->id ? 'selected' : ''}}
								>
								{{ ucwords($category->name) }}
							</option>
						@endforeach
					</select>

					@error('category_id')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="flex justify-center mt-6">
					<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white uppercase font-semibold text-xs py-2 px-10 rounded-full">Publish</button>
				</div>

			</form>
		</div>
    </section>

</x-layout>
