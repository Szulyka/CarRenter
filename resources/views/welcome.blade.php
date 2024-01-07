@vite(['resources/css/app.css', 'resources/js/app.js'])

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="bg-black items-center fixed top-0 w-full">
    <div class="flex items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="#" class="text-white text-lg font-semibold">Rent a car!</a>
        <div class="space-y-4 space-x-4 md:space-y-0 flex flex-wrap">
            <a href=""
               class="text-white hover:bg-blue-500 p-2 px-4 rounded-md transition-all">Jármű szerkesztése</a>
            <a href=""
               class="text-white hover:bg-blue-500 p-2 px-4 rounded-md transition-all">Foglalások</a>
        </div>
    </div>
</div>

<div class="bg-gradient-to-tr from-blue-600 to-red-600 min-h-screen flex items-center justify-center">
    <div class="flex flex-col bg-white bg-opacity-30 rounded-md shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">RC - Üdv az autóbérlő alkalmazásban. </h1>
        <h2 class="font-bold mb-4">Keressen az alábbi naptárral egy időintervallumra az elérhető autók megtekintéséhez.</h2>

        <form class="flex" method="GET" action="{{route('search')}}">
            <input class="w-full p-2 rounded-l-md" type="text" name="search"
                   placeholder="Keressen egy rendszámra"/>
            <button class="bg-black text-white p-2 rounded-r-md hover:bg-blue-500 w-40" type="submit">
                  Keresés
            </button>
        </form>
        @if (Session::has('noVehicle'))
            <div class="bg-red-200 rounded-lg font-bold text-center p-2 mb-2">Nincsenek ebben az időszakban elérhető járművek!
            </div>
        @endif

        @if (Session::has('reservationAdded'))
            <div class="bg-green-200 rounded-lg font-bold text-center p-2 mb-2">Foglalás sikeres!
            </div>
        @endif

        <form class="flex" method="GET" action="{{route('dateSearch')}}">
            <input class="w-full p-2 rounded-l-md" type="text" name="dates"/>
            <script>
                $(function() {
                    $('input[name="dates"]').daterangepicker({
                        "minYear": 2024,
                        "startDate": "01/01/2024",
                        "endDate": "01/03/2024"
                    }, function (start, end, label) {
                        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
                    })
                });
            </script>
            <button class="bg-black text-white p-2 rounded-r-md hover:bg-blue-500 w-40" type="submit">
                Kiválasztás
            </button>
        </form>
    </div>
</div>
