<nav class="navbar navbar-expand-lg bg-light navbar-light" >
    <a href="{{route('welcome')}}"><img src="/ad_images/internet.jpg" width="170" height="70"></a>
    <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
            @auth
                <li class="nav-item">
                    <a href="{{url('/home')}}" class="btn btn-info">Home</a>
                </li>
               @else 
               <li class="nav-item">
                <a href="{{route('login')}}" class="btn btn-info mr-3">Login</a>
               </li>

               @if(Route::has('register'))
               <li class="nav-item">
               <a href="{{route('register')}}" class="btn btn-warning">Register</a>
              </li>
              @endif
              
            @endauth
            
             @endif
    </ul>
</nav>