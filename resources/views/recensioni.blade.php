
@extends('layouts.generic')
@section('include')
        <link rel="stylesheet" href="{{ asset('css/recensioni.css')}}">
        
        <script src="{{ asset('js/recensioni.js')}}" defer></script>
    
    @section('content')
       
            <h1>
                Quello che gli altri dicono di noi.<br>
                Se ti va lascia una recensione anche tu
            </h1>
        </header>
        <article>
        <div class="containerForm">
                <form name="reviewForm" id="reviewForm" method="post" enctype="multipart/form-data" action="{{ route('new') }}">
                    @csrf
                    <label name="title"> Titolo Recensione(max 150 caratteri)</label>
                    <label><input type="text" id="title" name="title" placeholder="Scrivi il tuo titolo..."></label>
                    <label name="review">La tua Recensione (max 2000 caratteri)</label>
                    <label><textarea id="review" name="review" placeholder="Scrivi la tua recensione..." rows="7" cols="50"></textarea></label>
                    <label><span>Dai un voto alla tua esperienza con noi</span></label>
                    <label><select name='voto'>
                    <option value='1'>1/5</option>
                    <option value='2'>2/5</option>
                    <option value='3'>3/5</option>
                    <option value='4'>4/5</option>
                    <option value='5'>5/5</option>
    </select></label>
    <label> <input type="submit" id="submit" value="Invia la tua recensione"></label>
                </form>
            </div>

            <div class="sezioni">

            </div>

           
        </article>
        @endsection
        