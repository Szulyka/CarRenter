@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-black fixed top-0 w-full">
    <div class="flex items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{route('welcome')}}" class="text-white text-lg font-semibold hover:bg-blue-500 p-1.5 rounded-md transition-all">Főoldal</a>
        <h1 class="text-white text-lg font-semibold ">Admin</h1>
    </div>
</div>

<div class="bg-gradient-to-tr from-blue-600 to-red-600 min-h-screen flex items-center justify-center">
    <div class="flex flex-col bg-white bg-opacity-30 items-center rounded-md shadow-md p-6 mt-20 mb-8">
        <h1 class="text-2xl font-bold mb-6">Foglalások:</h1>
        @foreach($reservations as $v)
            <h1 class=" mb-2 mt-10 font-bold">Foglalt jármű: {{ $v->vehicle->license_plate }}</h1>
            @if (!($v->vehicle->image_file_name === null))
                <img class="rounded w-100 h-72 object-cover mb-4 mt-4 shadow-2xl"
                     src="{{ Storage::url('images/' . $v->vehicle->image_file_name) }}">
            @endif
            <h1 class=" mb-2">Név: {{ $v->name }}</h1>
            <h1 class="mb-2">E-mail: {{ $v->email }}</h1>
            <h1 class="mb-2">Cím: {{ $v->address }}</h1>
            <h1 class="mb-2">Telefonszám: {{ $v->phone_number }}</h1>
            <h1 class="mb-2">Lefoglalt napok száma: {{ $v->days_reserved }}</h1>
            <h1 class="mb-2">Foglalás kezdete: {{ $v->reservation_start }}</h1>
            <h1 class="mb-2">Foglalás vége: {{ $v->reservation_start }}</h1>
            <h1 class="mb-2">Fizetendő összeg: {{ $v->price }} Ft</h1>
        @endforeach
    </div>
</div>
