@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="bg-warning">DETTAGLI SINGOLO PILOTA: </h1>
            <br>                       
            <h3> ID PILOT: [{{ $pilots -> id }}] </h3>
            <br>
            <h3> NOME: {{ $pilots -> name }} </h3>
            <h3> COGNOME: {{ $pilots -> lastname }} </h3>
            <br>
            <h3> DATA NASCITA: {{ $pilots -> date_of_birth }} </h3>
            <br>
            <h3> NAZIONALITA': {{ $pilots -> nationality }} </h3>
            <br>
            <hr>

            {{-- <ul>
                @foreach ($pilots -> cars as $car)

                <li>
                    {{$car -> name}}
                </li>

                    
                @endforeach
            </ul> --}}
        </div>
    </div>
</div>
 
 @endsection