<x-guest-layout>
    <div
        class="flex flex-col bg-indigo-900 w-full h-screen"
        x-data="{
            showCreate: false,
            showSearch: false,
        }"
    >
    <nav class="flex pt-5 justify-between container mx-auto text-indigo-200 mb-4">
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

        <div>
            <livewire:livewire-datatables searchable="name, email, systolic, diastolic" exportable/>
        </div>

    </div>
</x-guest-layout>

