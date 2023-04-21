<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-4 rounded-lg border border-gray-50 shadow-sm">
            <h1 class="text-xl font-bold mb-10 text-center">Register!</h1>

            <form method="POST"  action="/register">
                @csrf
                
                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="email" type="email"/>
                <x-form.input name="password" type="password"/>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600" >
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
