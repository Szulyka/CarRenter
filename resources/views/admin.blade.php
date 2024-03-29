@vite(['resources/css/app.css', 'resources/js/app.js'])

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

<div class="bg-black items-center fixed top-0 w-full">
    <div class="flex items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{route('welcome')}}" class="text-white text-lg font-semibold p-2">Rent a car! - Admin Page</a>
        <div class="space-y-4 space-x-4 md:space-y-0 flex flex-wrap">
            <a href="{{ route('reservations.index') }}"
               class="text-white hover:bg-blue-500 p-2 px-4 rounded-md transition-all">Foglalások</a>
            <a href="{{ route('vehicles.create') }}"
               class="text-white hover:bg-blue-500 p-2 px-4 rounded-md transition-all">Új autó</a>
        </div>
    </div>
</div>

<div class="bg-gradient-to-tr from-blue-600 to-red-600 min-h-screen flex items-center justify-center">
    <div class="flex flex-col bg-white bg-opacity-30 rounded-md shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">RC - Üdv az autóbérlő alkalmazásban. </h1>
        <h2 class="font-bold mb-4">Keressen a szerkeszteni kívánt járműre!</h2>

        @if (Session::has('noAdminVehicle'))
            <div class="bg-red-200 rounded-lg font-bold text-center p-2 mb-2">Nincs ilyen jármű!</div>
        @endif

        @if (Session::has('vehicle_added'))
            <div class="bg-green-200 rounded-lg font-bold text-center p-2 mb-2">Jármű sikeresen hozzáadva!</div>
        @endif

        @if (Session::has('vehicle_edited'))
            <div class="bg-green-200 rounded-lg font-bold text-center p-2 mb-2">Jármű sikeresen módosítva!</div>
        @endif

        <form class="flex" method="GET" action="{{route('adminSearch')}}">
            <input class="w-full p-2 rounded-l-md" type="text" name="adminSearch"
                   placeholder="Keressen egy rendszámra"/>
            <button class="bg-black text-white p-2 rounded-r-md hover:bg-blue-500" type="submit">
                Keresés
            </button>
        </form>
    </div>
</div>
