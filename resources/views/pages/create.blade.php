@extends('layouts.main')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('store') }}">

                @csrf
                @method('POST')
                
                 <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">NOME MACCHINA</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="model" class="col-md-4 col-form-label text-md-right">MODELLO</label>
                    <div class="col-md-6">
                        <input id="model" type="text" class="form-control" name="model" value="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kw" class="col-md-4 col-form-label text-md-right">KW</label>
                    <div class="col-md-6">
                        <input id="kw" type="number" class="form-control" name="kw" value="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brand_id" class="col-md-4 col-form-label text-md-right">BRAND</label>
                    <div class="col-md-6">
                        <select id="brand_id" class="form-control" name="brand_id" value="" required> 

                            @foreach ($brands as $brand)
                            <option value="{{$brand -> id}}">                              

                                {{$brand -> name}}
                                
                            </option>                                    
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- per selezionare più piloti bisogna specificare al blade che si parla di array quindi si passono le quadre[] --}}
                <div class="form-group row">
                    <label for="pilots_id[]" class="col-md-4 col-form-label text-md-right">Pilots</label>
                    <div class="col-md-6">
                        <select id="pilots_id[]" class="form-control" name="pilots_id[]" required multiple>
                            @foreach ($pilots as $pilot)
                                <option value="{{ $pilot -> id }}">
                                    {{ $pilot -> firstname }}
                                    {{ $pilot -> lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                
                <div class="form-group row">
                    <div class="col-12 text-center">
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 @endsection