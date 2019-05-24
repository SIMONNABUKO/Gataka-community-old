@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-header"> <a style="color:white;" class="nav-link" href="{{ route('logout') }}">Logout</a></div>
                
                @if(count($usersOnline)>0)
                
                <p>Users Online:<span style="background-color:#51d8af; color:white;" class="badge">{{$total_users = count($usersOnline)}}</span></p>
                @endif
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <a href="/create" class="btn" style="background-color: #330080; color: white;">Sell Item</a><br><br><hr>
                        <div class="container">
                                <h1>Items Added by you</h1><hr>
                            <div class="row">
                                    
                                @if(count($items)>0)
                                @foreach ($items as $item)
                                 @if(!Auth::guest())
                                            @if(Auth::user()->id===$item->item_user_id)
                                <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
                                       <a href="/show/{{$item->id}}"><img src="{{asset('storage/images/items_images/'.$item->item_image)}}" class="img-fluid" alt="#"></a> 
                                        <h4>{{$item->item_name}}</h4>
                                        <p>{{$item->category->category_title}}</p>
                                       
                                                <a style="background-color:#51d8af; color:white;" class="btn" href="/edit/{{$item->id}}">Edit Item</a>
                                            </div>
                                                @endif
                                        @endif
                                    
                                @endforeach
                                @else
                                <p>There are no items added by you</p>
                                @endif

                                <div class="col-lg-2">

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<br><br><br><br><br>
