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
            <a href="{{route('home.replay', ['sender_id' => $message->sender->id, 'ad_id' => $message->ad_id])}}">Odgovori</a>
            <a href="{{ route('home.deleteMessage', ['id'=> $message->id]) }}" class="btn btn-sm btn-danger float-right">Obrisi</a>


          </li>
      @endforeach

    </ul>

  </div>
    </div>
</div>
@endsection