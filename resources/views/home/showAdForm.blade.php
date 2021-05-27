@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-4">
    @include('home.partials.sidebar')
  </div>

  <div class="col-8">
    
    <h3>Napravi novi oglas</h3> <br>
    <form action="{{ route ('home.saveAd')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="naslov" class="form-control" /> <br>
        <textarea name="body" placeholder="text" class="form-control" cols="30" rows="10"></textarea> <br>
        <input type="text" name="price" placeholder="cena" class="form-control" /> <br>
        <input type="file" name="image1" class="fomr-control" /> <br> <br>
        <input type="file" name="image2" class="fomr-control" /> <br> <br>
        <select name="category" class="form-control">
            @foreach ($all_categories as $category)
            
            <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach

        </select> <br>
        <button type="submit" class="btn btn-info">Save</button>


    </form>

  </div>
    </div>
</div>
@endsection