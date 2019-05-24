@extends('layouts.template')

@section('content') <br><br>
<div class="row">
    <div class="col-lg-12">
 
 
            {!! Form::open(array('action' => 'ItemsController@search', 'class'=>'form navbar-form navbar-right searchform', 'method'=>'GET')) !!}
            {!! Form::text('search', null,
                                   array('required',
                                        'class'=>'form-control',
                                        'placeholder'=>'Search for anything...')) !!} 
             {!! Form::submit('Search',
                                        array('class'=>'btn btn-light h2 btn-block')) !!}
         {!! Form::close() !!}

 

  

    </div>
</div>
    <h1>Items found:</h1>
    @if(count($items)>0)
<div class="row">
	


       @foreach($items as $item)
       <div style="background:url('storage/images/items_images/{{$item->item_image}}') no-repeat; background-size:100%; margin-bottom:40px;" class="col-md-12 col-xs-12 col-sm-12 col-lg-3 col-xl-3">
       {{-- <img class="img img-responsive " src=""> --}}

       </div>
       <div style="margin-bottom:40px; margin-left:20px" class="col-md-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6">
       <p class="h2"><a style = "color: #51d8af;"  href="/show/{{$item->id}}"> {{$item->item_name}}</a></p> 
       {{-- <p> {!!substr($book->book_descr, 0, 200)!!} </p> --}}
       <p> {!!$item->created_at!!} </p>
       <a class="btn btn-sm btn-dark" href="/show/{{$item->id}}">Read more...</a>
       </div>
       <hr style="margin:2px solid navy;">
           @endforeach
           <div class="col-md-12 col-xs-12 col-sm-12 col-lg-3 col-xl-3">
            <p class="h6" style = "color: #330080;"> Products Categories</p> 
            
           
            </div>       
</div>

    @else
    <h2 class="alert alert-danger">Whoops!!! We are sorry the item haven't been posted on this website yet. Please register and we will notify you once the item is uploaded</h2>
    @endif

@stop()
<br><br><br><br><br>
