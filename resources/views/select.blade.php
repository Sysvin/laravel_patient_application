<x-guest-layout>

    <div class="flex flex-col bg-indigo-900 w-full h-screen">
        <nav class="flex pt-5 justify-between container mx-auto text-indigo-200">
            <a class="flex flex-col text-4xl hover:text-indigo-500" href="/">
                <h1>LaraLink </h1>
                <span class="text-2xl">Health</span>
            </a>
            <div class="flex justify-end">
                @auth
                    <a href="{{ route('dashboard') }} ">Dashboard</a>
                @else
                    <a href="{{ route('login') }} ">Login</a>
                @endauth
            </div>
        </nav>
        <hr class="text-white">

        <div class="w-2/3 p-10 text-center mx-auto">
            <p class="text-white text-3xl font-extrabold">
                Search Records
            </p>
            <form
                action="{{ url('add') }}"
                method="post"
                class="flex flex-col items-center p-6">
            @csrf
                <x-input
                    class="px-3 py-2 w-60 border border-blue-400 mb-5"
                    type="text"
                    name="name"
                    placeholder="First and Last Name"
                    pattern="\s*[^()/><\][\\\x22,;|!.]+"
                >
                </x-input>

                    @error('name')
                        <div class="text-center border bg-red p-2">
                            <p class="text-white">{{ $message }}<p>
                        </div>
                    @enderror

                <x-button
                    class="px-4 py-2 mt-5 w-60 bg-blue-500 justify-center"
                    name="submit"
                    value="submit"
                >
                    Submit
                </x-button>
            </form>
        </div>

    </div>
</x-guest-layout>
