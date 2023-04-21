@props(["heading"])
	
<section class="mt-6 max-w-5xl mx-auto ">
	<h2 class="font-bold text-lg mb-8 pb-2 border-b border-gray-500">{{$heading}}</h2>


	<div class="flex">
		<aside class="w-48">
			<h4 class="font-semibold mb-6">Links</h4>
			<ul class="space-y-2">
				<li>
					<a href="/admin/dashboard" class="{{request()->is('admin/dashboard') ? 'text-blue-500': ''}}">Dashboard</a>
				</li>
				<li>
					<a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500': ''}}">New Post</a>
				</li>
			</ul>
		</aside>

		<main class="flex-1">
			<div class="bg-gray-50 rounded-lg shadow-sm px-6 py-8">
				{{$slot}}
			</div>
		</main>
	</div>
</section>