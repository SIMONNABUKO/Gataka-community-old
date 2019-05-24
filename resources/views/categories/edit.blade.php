
            @extends('layouts.template')
            @section('content') <br><br><br>
            <h1 style="background-color:#51d8af; border-color:51d8af; color:white" 
            class="btn btn-default">Edit Your Item</h1>
            
<div class="row">
    <div class="col-lg-10">
        <div class="container">

{!! Form::open(['action'=>['ItemsController@update',$item->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data'])!!}
{{Form::label('item_name', 'Item Name:')}}
{{Form::text('item_name',$item->item_name,array('class'=>'form-control') )}}

{{Form::label('item_price', 'Price:')}}
{{Form::text('item_price',$item->item_price,array('class'=>'form-control') )}}

{{Form::label('item_quantity', 'The number of items:')}}
{{Form::text('item_quantity',$item->item_quantity,array('class'=>'form-control') )}}

{{Form::label('item_vendor', 'Your Name:')}}
{{Form::text('item_vendor',$item->item_vendor,array('class'=>'form-control') )}}

{{Form::label('item_location', 'Your Location:')}}
{{Form::text('item_location',$item->item_location,array('class'=>'form-control') )}}

{{Form::label('item_vendor_phone', 'Your Phone Number:')}}
{{Form::text('item_vendor_phone',$item->item_vendor_phone,array('class'=>'form-control') )}}

{{Form::label('item_image', 'Item Image uload:')}}
{{Form::file('item_image',null,array('class'=>'form-control') )}}

{{Form::label('item_description', 'Describe Your Item:')}}
{{Form::textarea('item_description',$item->item_description,array('class'=>'form-control') )}}

{{Form::submit('Update Item', array('class'=>'btn btn-sm btn-success btn-block'))}}<br>
{!!Form::close()!!}
        </div><br><br><br>
        
        
    </div>
    <div class="col-lg-2">
        <p>Another column</p>
    </div>
</div>
            
           @stop