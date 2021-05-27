@extends('layouts.master')

@section('main') <br>


    <div class="row">
        <div class="col-3 bg-secondary">
            <ul class="list-group list-group-flush">
                @foreach ($all_categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('welcome')}}?cat={{$category->name}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-9">
            <h3 class="text-center">Svi oglasi</h3> <br>
            <ul class="list-group">
                @foreach ($all_ads as $ad)
                    <li class="list-group-item">
                        <a href="{{ route('singleAd', ['id' => $ad->id]) }}">{{$ad->title}}</a>
                        <span class="badge badge-success float-right">{{$ad->views}} pregleda</span>
                    </li>
                @endforeach
            </ul>
        </div>

</div>

@endsection
