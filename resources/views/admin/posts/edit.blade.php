<x-layout>
	<x-settings :heading="'Edit Post : ' .$post->title">
		<form action="/admin/posts/{{$post->slug}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')

			<x-form.input name="title" :value="$post->title"/>
			<x-form.input name="slug" :value="$post->slug"/>

			<div class="flex mt-6 items-center">
				<div class="flex-1">
					<x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>
				</div>
				<img src={{!$post->thumbnail ? "/images/illustration-1.png" : "/storage/".$post->thumbnail}} alt="" class="rounded-xl ml-6" width="100">
			</div>

			<x-form.textarea name="excerpt" label="Post Summary" :value="$post->excerpt"/>
			<x-form.textarea name="body" label="Post Body" row=10, col=30 :value="$post->body"/>

			<x-form.inputWrapper>
				<x-form.label name='category_id' label='Select Category'/>
				<select name="category_id" id="category_id">
					@foreach (\App\Models\Category::all() as $category)
						<option 
							value="{{ $category->id }}" 
							{{old('category_id',$post->category_id) == $category->id ? 'selected' : ''}}
							>
							{{ ucwords($category->name) }}
						</option>
					@endforeach
				</select>
				<x-form.error name="{{'category_id'}}"/>
			</x-form.inputWrapper>

			<div class="flex justify-center mt-6">
				<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white uppercase font-semibold text-xs py-2 px-10 rounded-full">Update</button>
			</div>

		</form>
	</x-settings>
</x-layout>
