@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-4">
    @include('home.partials.sidebar')
  </div>

  <div class="col-8">
    
    <ul class="list-group">
      @foreach ($messages as $message)
          <li class="list-group-item">
            <p><b>Oglas:</b> {{$message->ad->title}} <span class="float-right">{{$message->created_at->format('d M Y')}}</span></p>
            <p><b>Poslato od:</b> {{$message->sender->name}}</p>
            <p><b>Poruka:</b> {{$message->text}}</p>

          </li>
      @endforeach
      <li class="list-group-item mb-2">
          <form action="{{ route('home.replayStore')}}" method="POST">
              @csrf
              <input type="hidden" name="sender_id" value="{{$sender_id}}">
              <input type="hidden" name="ad_id" value="{{$ad_id}}">
              <textarea name="msg" class="form-control" cols="30" rows="10"></textarea>
              <button type="submit" class="form-control btn btn-primary">Odgovori</button>
          </form>

          @if (session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message')}}
          </div> 
        
        @endif



    </ul>

  </div>
    </div>
</div>
@endsection