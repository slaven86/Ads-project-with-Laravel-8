@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  

  <div class="col-12">

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

    </div>

        @if (Auth::user() && Auth::user()->id !== $single_ad->user_id)
            <div class="row mt-3">
                <div class="col-6">
                    <form action="{{route('sendMessage', ['id' => $single_ad->id ])}}" method="POST">
                        @csrf
                    <textarea name="msg" class="form-control" placeholder="Send message to {{$single_ad->user->name}} .. " cols="30" rows="10" ></textarea> <br>
                    <button type="submit" class="form-control btn btn-primary">Send</button> <br> <br>
                     </form>

                     @error('msg')
                       <p class="bg-warning">{{$errors->first('msg')}}</p>
                     @enderror
                    @if (session()->has('message'))
                      <div class="alert alert-success">
                        {{session()->get('message')}}
                      </div> 
                    
                    @endif
                </div>
            </div>
        @endif
    

    <div class="row">
      <div class="col-6">
        <button type="submit" class="btn btn-success float-left">{{$single_ad->user->name}}</button>
      </div>
      <div class="col-6">
        <button type="submit" class="btn btn-success float-right ">{{$single_ad->price}},<small>00</small> rsd</button>
      </div>

    </div>
    


  </div>
    </div>
</div>
@endsection