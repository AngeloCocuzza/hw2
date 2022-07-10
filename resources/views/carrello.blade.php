@extends('layouts.generic')
@section('include')
        <link rel="stylesheet" href="{{ asset('css/carrello.css')}}">
        <script src="{{ asset('js/carrello.js') }}" defer></script>
        @endsection
        @section('content')
        </header>
        <div class='cart'>Il mio carrello</div>
        <section>          
        @foreach($tot as $value)
        <div class='container'>@if ($value->totale == '') <a href="{{ route('pacchetti') }}">IL TUO CARRELLO E' VUOTO, PROCEDI CON GLI ACQUISTI!</a> @endif </div>
        @endforeach
        </section>
        @foreach($tot as $value)
        <div class='check'>
        @if ($value->totale == '') TOTALE = 0.00€ @else {{'TOTALE = '.$value->totale.'.00€'}} @endif
        @endforeach
            <button>Check Out</button> 
        </div>
        @endsection

        