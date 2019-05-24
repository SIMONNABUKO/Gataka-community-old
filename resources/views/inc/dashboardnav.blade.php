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
                   <li class="nav-item">   <a style="color:white;" class="nav-link" href="{{ url('/home') }}">Dashboard</a></li>
                  @else
                  <li class="nav-item">   <a style="color:white;" class="nav-link" href="{{ route('login') }}">Login</a></li>
  
                      @if (Route::has('register'))
                      <li class="nav-item">       <a style="color:white;" class="nav-link" href="{{ route('register') }}">Register</a></li>
                      @endif
                  @endauth
              
          @endif
              
                                    
                                </ul>
                            </div>
                        </nav>
                    </div> 
                </div>
            </div>
        </div>
    </div>
  
  
  