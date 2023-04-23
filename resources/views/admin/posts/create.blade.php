<x-layout>
	<x-settings heading="Publish New Post">
		<form action="/admin/posts" method="post" enctype="multipart/form-data">
			@csrf

			<x-form.input name="title"/>
			<x-form.input name="slug"/>
			<x-form.input name="thumbnail" type="file"/>
			<x-form.textarea name="excerpt" label="Post Summary"/>
			<x-form.textarea name="body" label="Post Body" row=10, col=30/>

			<x-form.inputWrapper>
				<x-form.label name='category_id' label='Select Category'/>
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
				<x-form.error name="{{'category_id'}}"/>
			</x-form.inputWrapper>

			<div class="flex justify-center mt-6">
				<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white uppercase font-semibold text-xs py-2 px-10 rounded-full">Publish</button>
			</div>

		</form>
	</x-settings>
</x-layout>
