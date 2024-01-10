@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-black fixed top-0 w-full">
    <div class="flex items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{route('welcome')}}" class="text-white text-lg font-semibold hover:bg-blue-500 p-1.5 rounded-md transition-all">Főoldal</a>
        <h1 class="text-white text-lg font-semibold ">Felhasználó</h1>
    </div>
</div>

<div class="bg-gradient-to-tr from-blue-600 to-red-600 min-h-screen flex items-center justify-center">
    <div class="flex flex-col bg-white bg-opacity-30 items-center rounded-md shadow-md p-6 mt-20 mb-8">
        <h1 class="text-2xl font-bold mb-6">Elérhető járművek:</h1>
        @foreach($vehicles as $v)
            @if ($v->is_active)
                <h1 class=" mb-2 font-bold">{{ $v->license_plate }}</h1>
                <h1 class=" mb-2">{{ $v->brand }}</h1>
                <h1 class="mb-2">{{ $v->type }}</h1>
                <h1 class="mb-2">{{ $v->year }}</h1>
                <h1 class="mb-2">Ár/nap: {{ $v->pricePerDay }} Ft</h1>
                @if (!($v->image_file_name === null))
                    <img class="rounded w-100 h-72 object-cover mb-4 mt-4 shadow-2xl"
                         src="{{ Storage::url('images/' . $v->image_file_name) }}">
                @else
                    🚫📷
                @endif
                <a href="{{route('reservations.create', $v)}}" class="mb-6 font-bold hover:underline">Lefoglalom!</a>
            @endif
        @endforeach
    </div>
</div>
