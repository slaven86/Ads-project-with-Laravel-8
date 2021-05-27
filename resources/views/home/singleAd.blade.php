@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-4">
    @include('home.partials.sidebar')
  </div>

  <div class="col-8">

    <h4>{{$single_ad->title}}</h4> <br> <br>

    <div class="row p-2">
        @if (isset($single_ad->image1))
            
      <div class="col-6">
            <img src="/ad_images/{{$single_ad->image1}}" class="img-fluid" />  
     </div>  
                  
        @endif

        @if (isset($single_ad->image2))
            
        <div class="col-6">
              <img src="/ad_images/{{$single_ad->image2}}" class="img-fluid" />  
       </div>  
                    
          @endif
        
    </div>

    <div class="row">
      <div class="col-12">
        <p>{{$single_ad->body}}</p>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-success float-right">{{$single_ad->price}},<small>00</small> rsd</button>
      </div>
    </div>


  </div>
    </div>
</div>
@endsection