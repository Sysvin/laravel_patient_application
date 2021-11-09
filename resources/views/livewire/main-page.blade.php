<div
    class="flex flex-col bg-indigo-900 w-full h-screen"
    x-data="{
         showCreate: false,
    }"
    >
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

        <div class="flex flex-row container mx-auto items-center h-full">
            <div class="flex flex-col w-1/2 items-start">
                <h1
                    class="text-white font-bold text-xl leading-tight mb-2">
                    Create New Patient
                </h1>
                <x-button
                    class="py-2 px-5 bg-red-500 hover:bg-red-700"
                    x-on:click="showCreate = true"
                >
                    Get Started
                </x-button>
            </div>
        </div>

        <div class="flex container mx-auto items-center h-full">
            <div class="flex flex-col w-1/2 items-start">
                <h1 class="text-white font-bold text-xl leading-tight mb-2">
                    Enter Blood Pressure
                </h1>
                <a href="/select">
                    <x-button
                        class="py-2 px-5 bg-red-500 hover:bg-red-700"
                    >
                        Get Started
                    </x-button></a>
            </div>
        </div>

        <div class="flex container mx-auto items-center h-full">
            <div class="flex flex-col w-1/2 items-start">
                <h1 class="text-white font-bold text-xl leading-tight mb-2">
                    View Records
                </h1>
                <a href="/table">
                    <x-button
                        class="py-2 px-5 bg-red-500 hover:bg-red-700"
                    >
                        Get Started
                    </x-button>
                </a>

            </div>
        </div>

        {{-- modal #1 --}}
        <div
            class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-full"
            x-show="showCreate"
            x-on:click.self="showCreate=false"
            x-on:keydown.escape.window ="showCreate=false"
        >

        <div class="bg-pink-500 shadow-xl rounded-xl mx-auto">
            <p class="text-white text-3xl font-extrabold text-center mt-5">
                 New Patient
            </p>
            <form
                class="flex flex-col items-center p-6"
                wire:submit.prevent="create"
            >
                <x-input
                    class="px-4 py-2 w-80 border border-blue-400 mb-5"
                    type="text"
                    name="name" placeholder="First and Last Name"
                    wire:model="name"
                >
                </x-input>

                 @error('name')<span>{{ $message }}</span>@enderror

                 <x-input
                    class="px-4 py-2 w-80 border border-blue-400"
                    type="email"
                    name="email" placeholder="Email address"
                    wire:model="email"
                >
                </x-input>

                    @error('email')<span>{{ $message }}</span>@enderror
                    @if (session()->has('message'))
                        <div class="mt-2 text-white">
                             {{ session('message') }}
                        </div>
                    @endif

                <x-button
                    class="px-4 py-2 mt-5 w-80 bg-blue-500 justify-center"
                    >
                    Submit
                </x-button>
            </form>
        </div>

</div>
