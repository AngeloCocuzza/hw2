<html>
    <head>
        <meta charset="utf-8">
        <title>SicilyTravel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/home.css')}} ">
        <script src="{{ asset('js/home.js')}}" defer></script>
    </head>
    <body>
    @section('content')
        <header>
            <div id="Overlay"></div>
            <nav>
                <div id="logo">
                    sicilytravel
                </div>
            <div id="links">
                <a href="{{ route('home') }}" >Home</a>
                <a href="{{ route('pacchetti') }}">Pacchetti</a>
                @foreach($tot as $value)
                <a href="{{ route('carrello') }}">@if ($value->totale == '') 0.00€ @else {{$value->totale.'.00€'}} @endif<img src="images/carti.png"></a>
                @endforeach
                <a href="{{ route('recensioni') }}">Recensioni</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="hidden" id="mobile">

                <div>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('pacchetti') }}">pacchetti</a>
                @foreach($tot as $value)
                <a href="{{ route('carrello') }}">@if ($value->totale == '') 0.00€ @else {{$value->totale.'.00€'}} @endif<img src="images/carti.png"></a>
                @endforeach
                <a href="{{ route('recensioni') }}">Recensioni</a>
                <a href="{{ route('logout') }}">Logout</a>
                <img class='elimina' src="images/x.png">
                </div>
            </div>
            </nav>
            <h1>
                <p>Benvenuto {{$user['name']}}!</p>
                <strong>Ti trovi a Catania e vuoi visitare la sicilia?</strong><br>
                <em>Compra il tuo pacchetto All-inclusive per un tour guidato a prezzi stracciati.</em>
            </h1>
        </header>
        <article>
            

            <div id="desc">
                <p>
                    SicilyTravel fa tutto per te ,tu devi solo scegliere dove andare.
                </p>
                <p>
                    Cerca tra i nostri tour:
                </p>
            <div id="filter">
                <input type="text" name="" placeholder="Cerca">
            </div>

            </div>

            <div class="sezioni">
            </div>

            
        </article>
        
        <footer>
            <p>Angelo Cocuzza 
                Matricola:1000001139</p>
            
        </footer>
        @show
    </body>
</html>


