@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-gradient-to-tr from-blue-600 to-red-600 min-h-screen p-6">

    <a href="{{ url()->previous() }}" class="absolute top-0 left-0 text-black text-2xl">⬅️ </a>

    <div class="flex items-center justify-center p-6">
        <div class="bg-white bg-opacity-30 rounded-md shadow-md p-6 w-full">

            <h1 class="text-2xl font-bold mb-4">Adja meg adatait a foglaláshoz:</h1>
            <h1 class="font-bold mb-4">Választott autó {{ $vehicle->license_plate }}</h1>
            <form class="flex flex-col" method="POST" action="{{route('reservations.store') }}">
                @csrf

                @error('name')
                <div class="font-medium">Hiba: {{$message}}</div>
                @enderror
                <div class="relative">
                    <input class="w-full p-2 rounded mb-4" type="text" name="name" placeholder="Név" value="{{old('name', '')}}"/>
                </div>

                @error('email')
                <div class="font-medium">Hiba: {{$message}}</div>
                @enderror
                <input class="w-full p-2 rounded mb-4" type="text" name="email" placeholder="E-mail cím" value="{{old('email', '')}}"/>

                @error('address')
                <div class="font-medium">Hiba: {{$message}}</div>
                @enderror
                <input class="w-full p-2 rounded mb-4" type="text" name="address" placeholder="Cím" value="{{old('address', '')}}"/>

                @error('phone')
                <div class="font-medium">Hiba: {{$message}}</div>
                @enderror

                <input class="w-full p-2 rounded mb-4" type="text" name="phone" placeholder="Telefonszám" value="{{old('phone', '')}}"/>

                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                <h1> Foglalt napok száma: TODO (módosításhoz térjen vissza a főoldalra)</h1>
                <h1>Foglalás össszege TODO</h1>

                <button class="bg-black text-white p-2 rounded hover:bg-blue-500" type="submit">
                    Foglalás
                </button>
            </form>
        </div>
    </div>
</div>
