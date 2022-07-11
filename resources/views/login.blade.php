<html>
    <head>
    <meta charset="utf-8">
        <title>Accedi a SicilyTravel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        @section('content')
    </head>
    <body>
        
        <section>
        <h1>Accedi a SicilyTravel</h1>
        <form name='login' method='post'>
            @csrf
            <div class='email'>
                <div><input type="text" name='email' placeholder="Email" ></div>
            </div>
            <div class="password">
                <div><input type='password' name='password' placeholder="Password"></div>
            </div>
            <div>
                <p>{{ $error }}</p>
                <input type='submit' value="Accedi">
            </div>
        </form>
        <div class="signup"><a href="{{ route('register') }}">Iscriviti a SicilyTravel</a>
        </section>
        
    </body>
</html>
