@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-black fixed top-0 w-full">
    <div class="flex items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{url()->previous()}}" class="text-white text-lg font-semibold">Vissza</a>
        <div class="space-x-4">
            <a href=""
               class="text-white hover:bg-blue-500 p-2 px-4 rounded-md transition-all">Jármű szerkesztése</a>
            <a href=""
               class="text-white hover:bg-blue-500 p-2 px-4 rounded-md transition-all">Foglalások</a>
        </div>
    </div>
</div>

<div class="bg-gradient-to-tr from-blue-600 to-red-600 min-h-screen flex items-center justify-center">
    <div class="flex flex-col bg-white bg-opacity-30 items-center rounded-md shadow-md p-6 mt-4">
        @foreach($vehicles as $v)
            <h1 class="text-xl mb-4">Gépjármű:</h1>
            <h1 class=" mb-2 font-bold">{{ $v->license_plate }}</h1>
            <h1 class=" mb-2">{{ $v->brand }}</h1>
            <h1 class="mb-2">{{ $v->type }}</h1>
            <h1 class="mb-2">{{ $v->year }}</h1>
            @if (!($v->image_file_name === null))
                <img class="rounded w-100 h-72 object-cover mb-4"
                     src="{{ Storage::url('images/' . $v->image_file_name) }}">
            @else
                🚫📷
            @endif
        @endforeach
    </div>
</div>
