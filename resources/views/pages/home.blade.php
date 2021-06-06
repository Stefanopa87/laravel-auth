@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>
                <ul>
                    @foreach ($cars as $car)
                    <li>
                        <span style="color: blue;">NOME, MODELLO e KW (from table Cars): </span>

                        {{$car -> name}} |
                        {{$car -> model}} 
                        kw=> {{$car -> kw}}
                        <br>

                        <span style="color: purple;">NOME e NAZIONALITA' (from table Brands): </span>

                        {{ $car -> brand -> name}} || {{ $car-> brand -> nationality}}

                        <ul>
                            @foreach ($car->pilots as $pilot )
                            <li>
                                <span style="color: red;">NOME e DATA DI NASCITA (from table Pilots): </span>
                                    
                                <a href="{{route('pilot', $pilot->id )}}"> {{ $pilot -> name}} </a>
                                {{ $pilot -> lastname}}
                                {{ $pilot -> date_of_birth}}                                    
                                
                            </li>
                        
                            @endforeach
                        </ul>
                    </li>
                    <hr>                        
                    @endforeach
                </ul>            
            </h4>
        </div>
    </div>
</div>
 
@endsection