
    <!--============================= HEADER =============================-->
    <div class="nav-menu">
      <div class="bg transition">
          <div class="container-fluid fixed">
              <div class="row">
                  <div style="background-color:#000080; color:white; border-color:#000080;" class="col-md-12">
                      <nav  class="navbar navbar-expand-lg navbar-light">
                        <a style="color:white;"  class="navbar-brand" href="{{ url('/') }}">Home
                          <button style="color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
            </button> <span><a style=" color:#51d8af; " href="/create" class="">Sell Item <i class="fa fa-plus-circle"></i></a></span>
                          <div  class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                              <ul  class="navbar-nav">
                                  <li class="nav-item dropdown">
                                      <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 </a>
                  
                </li>
                @if (Route::has('login'))
                            
                @auth
                <li class="nav-item"><a class="nav-link" href="#"><img class="img rounded-circle"  height='30' width='30' src="{{asset('storage/images/gataka-avatar-image.png')}}" alt=""></a></li>
            <li class="nav-item"><a style="color:wheat" class=" btn btn-sm nav-link" href="#">{{Auth::user()->name}}</a></li>
               <li class="nav-item"> <a style="color:#51d8af" class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                <li class="nav-item">   <a style="color:white;" class="nav-link" href="{{ url('/home') }}">Dashboard</a></li>
                @else
                <li class="nav-item">   <a style="color:white;" class="nav-link" href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                    <li class="nav-item">       <a style="color:white;" class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
            
        @endif
                                  <li class="nav-item active">
                                      <a style="color:white;" class="nav-link" href="#">About</a>
                                  </li>
                                  <li  class="nav-item">
                                      <a style="color:white;" class="nav-link" href="#">Blog</a>
                                  </li>
                                  <li><a style="background-color:#51d8af; color:white; border-color:#51d8af;" href="/create" class="btn btn-outline-light top-btn">Sell Item <i class="fa fa-plus-circle"></i></a></li> &nbsp;

                @if(Auth::user())
                    @if(Auth::user()->email=='simonnabuko@gmail.com')
                        <li><a style="background-color:#51d8af; color:white; border-color:#51d8af;" href="categories/create" class="btn btn-outline-light top-btn">Add Category <i class="fa fa-plus-circle"></i></a></li>
                    @endif
                @endif  
                              </ul>
                          </div>
                      </nav>
                  </div> 
              </div>
          </div>
      </div>
  </div>