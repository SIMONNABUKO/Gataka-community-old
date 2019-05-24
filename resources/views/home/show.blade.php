@extends('layouts.template')
@section('content') <br><br><br>
<h1 style="background-color:#51d8af; border-color:51d8af; color:white" 
class="btn btn-default">Item Display</h1>

<div class="row">
<div class="col-lg-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset('storage/images/items_images/'.$item->item_image)}}" class="img-responsive img-thumbnail" style="width:100%" alt="Image">
            </div>
            <div class="col-lg-8">
                <p>{{$item->item_name}} <span class="badge badge-danger"> New</span></p>
                <p>{{$item->item_description}}</p>
                <p>CATEGORY: {{$item->category->category_title}}</p> --}}
                <p>Category Description: {{$item->category->category_description}}</p>
                
                    <p><span  style="color:#51d8af"> Phone Number: </span>0{{$item->item_vendor_phone}}</p>
                 @if(!Auth::guest()) 
                    @if(Auth::user()->id===$item->item_user_id)  
                        <a class="btn btn-sm btn-danger" href="/edit/{{$item->id}}">Edit</a>
                    @endif
            @endif
            </div>
        </div>

    </div>

</div>
<div class="col-lg-2">
        <p>Another column</p>
        </div>
</div><br><br><br>

@stop