@extends('layouts.generic')
@section('include')
        <link rel="stylesheet" href="{{ asset('css/pacchetti.css')}}">
        <script src="{{ asset('js/pacchetti.js')}}" defer></script>
        @endsection
    @section('content')
        </header>
        <section>
        <div class='form'>
            <form name="arrivo" id="arrivo">
            Cerca una destinazione e guarda le opzioni a tua disposizione
            <input type='text' name='destinazione' id='destinazione' placeholder='Cerca'>
            <input type='submit' id='submit' value='Cerca'>
            <div class='arr'></div>
            </form>
            </div>
        <div class='container'>
        </div>
        <div class='form'>
            <form name="meteo" id="meteo">
            Vuoi sapere come sarà la giornata nelle date dei nostri tour cerca qua 
            <input type='text' name='citta' id='citta' placeholder='Cerca'>
            <input type='submit' id='submit' value='Cerca'>
            <div class='weather'></div>
            </form>
            </div>
            
        </section>
       @endsection