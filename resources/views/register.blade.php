<html>
    <head>
        <meta charset="utf-8">
        <title>Iscriviti a SicilyTravel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel='stylesheet' href= "{{asset('css/signup.css')}}">
        <script src="{{ asset('js/signup.js') }}" defer></script>
    </head>
    <body>
        @section('content')
        <section>
        <h1>Crea il tuo account</h1>
        <form name='signup' method='post' enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf
            <div class="name">
                <div><input type='text' name='name' placeholder="Nome"></div>
            </div>
            <div class="lastname">
                <div><input type='text' name='lastname' placeholder="Cognome"></div>
            </div>
            <div class="email">
                <div><input type='text' name='email' placeholder="Email"></div>
            </div>
            <div class="password">
                <div><input type='password' name='password' placeholder="Password"></div>
            </div>
            <div class="confirm_password">
                <div><input type='password' name='confirm_password' placeholder="Conferma Password" ></div>
            </div>
            <div class="allow"> 
                    <div><input type='checkbox' name='allow' value="1"></div>
                    <div><label for='allow'>Acconsenti l'uso dei dati personali</label></div>
                </div>
            <div class="submit">
                <input type='submit' value="Registrati" id="submit" disabled>
            </div>
        </form>
        <div class="signup">Hai già un account? <a href="{{ route('login') }}">Accedi</a>
        </section>
        @show
    </body>

</html>