<x-guest-layout>
    <div class="flex flex-col bg-indigo-900 w-screen h-full">
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

        <div class=" p-7 mx-auto text-center border rounded-xl mt-4">
            <p class="text-white text-2xl font-extrabold">
                Blood Pressure for:
            <div class="text-white text-xl underline hover:text-indigo-500">
                <a href="/view/{{$patient->id}}"><p>{{$patient->name}}</p></a>
            </div>

            @if (Session::has('success'))
            <div class="text-white">
                {{Session::get('success')}}
                {{Session::put('success', null)}}
            </div>
            @endif

            <form
                action="{{ url('submitPressureForm') }}"
                method="post"
                class="flex flex-col items-center p-3">
            @csrf
                <x-input
                    type="number"
                        name="id"
                        value="{{$patient->id}}"
                    style="display:none">
                </x-input>
                <x-input
                    class="px-4 py-2 w-4/5 border border-blue-400 mb-3"
                        type="number"
                        name="systolic"
                        placeholder="Systolic Pressure"
                    required
                >
                </x-input>
                <x-input
                    class="px-3 py-2 w-4/5 border border-blue-400 mb-2"
                        type="number"
                        name="diastolic"
                        placeholder="Diastolic Pressure"
                    required
                >
                </x-input>
                <x-button
                    class="px-4 py-2 mt-5 w-4/5 bg-blue-500 justify-center"
                    name="submit"
                    value="submit"
                >
                    Submit
                </x-button>
            </form>

        </div>
    </div>
    </x-guest-layout>












