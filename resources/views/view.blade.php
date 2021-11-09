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



        <div class=" p-7 mx-auto text-center border rounded-xl mt-4 mb-20">
        <p class="text-white text-2xl font-extrabold">
            Blood Pressures for:</p>
            <div class="text-white text-xl underline">
                <a href=""><p>{{ $patient->name }}</p></a>
            </div>
        <table class="mt-3">
            <tr class="text-white">
                <th class="border p-2">Systolic</th>
                <th class="border p-2">Diastolic</th>
                <th class="border p-2">Time Entered</th>
            </tr>
            @foreach ($pressures as $pressure)
            <tr class="text-white">
                <td class="border p-2">{{$pressure->systolic}}</td>
                <td class="border p-2">{{$pressure->diastolic}}</td>
                <td class="border p-2">{{$pressure->created_at}}</td>
            </tr>

            @endforeach
        </table>




        </div>
    </div>
    </x-guest-layout>












