
<html>    
    <head>
        <meta charset="utf-8">
        <title>pacchetti - SicilyTravel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        @yield('include')
    </head>
    <body>
       
        <header>
        <nav>
                <div id="logo">
                    SicilyTravel
                </div>
            <div id="links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('pacchetti') }}">pacchetti</a>
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
            @yield('content')
            <footer>
            <p>Angelo Cocuzza 
                Matricola:1000001139</p>
            
        </footer>
        @show
    </body>
</html>