<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-4 rounded-lg border border-gray-50 shadow-sm">
            <h1 class="text-xl font-bold mb-10 text-center">Register!</h1>

            <form method="POST"  action="/register">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        name
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           id="name"
                           name="name"
                           value="{{old('name')}}"
                           required
                    />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Username
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           id="username"
                           name="username"
                           value="{{old('username')}}"
                           required
                    />

                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           id="email"
                           name="email"
                           value="{{old('email')}}"
                           required
                    />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           id="password"
                           name="password"
                           required
                    />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600" >
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
