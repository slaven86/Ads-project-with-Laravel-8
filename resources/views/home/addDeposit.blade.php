@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-4">
    @include('home.partials.sidebar')
  </div>

  <div class="col-8">
    
    <form action="{{ route('home.addDeposit') }}" method="POST">
        @csrf
    <h3>Dodaj deposit</h3> <br> <br>
    <input type="text" placeholder="deposit" class="form-control" name="deposit" /> <br>
    <button type="submit" class="btn btn-info">Dodaj</button>
    @error('deposit')
        <p class="bg-warning">{{$errors->first('deposit')}}</p>
    @enderror
    
    
    </form>
  </div>
    </div>
</div>
@endsection