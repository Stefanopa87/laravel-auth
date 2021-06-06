@extends('layouts.main')
@section('content')

<form method="POST" action="{{ route('update', $car -> id) }}">
    @csrf
    @method('POST')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">NOME MACCHINA</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ $car -> name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="model" class="col-md-4 col-form-label text-md-right">MODELLO</label>
        <div class="col-md-6">
            <input id="model" type="text" class="form-control" name="model" value="{{ $car -> model }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="kw" class="col-md-4 col-form-label text-md-right">KW</label>
        <div class="col-md-6">
            <input id="kw" type="number" class="form-control" name="kw" value="{{ $car -> kw }}">
        </div>
    </div>
   <div class="form-group row">
        <label for="brand_id" class="col-md-4 col-form-label text-md-right">Brand</label>
        <div class="col-md-6">
            <select id="brand_id" class="form-control" name="brand_id" required >
                <option selected disabled>Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand -> id }}">{{ $brand -> name }} ({{ $brand -> nationality }})</option>
                @endforeach
            </select>
        </div>
    </div>
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
    <div class="form-group row ">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">
                UPDATE
            </button>
        </div>
    </div>
</form>
 
 @endsection