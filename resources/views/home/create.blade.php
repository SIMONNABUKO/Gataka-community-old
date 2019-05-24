
            @extends('layouts.template')
            @section('content') <br><br><br>
            <h1 style="background-color:#51d8af; border-color:51d8af; color:white" 
            class="btn btn-default">Sell Your Item</h1>
            
<div class="row">
    <div class="col-lg-10">
        <div class="container">
           

{!! Form::open(array('action'=>'ItemsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'))!!}
{{Form::label('item_name', 'Item Name:')}}
{{Form::text('item_name',null,array('class'=>'form-control') )}}

{{Form::label('item_price', 'Price:')}}
{{Form::text('item_price',null,array('class'=>'form-control') )}}

{{Form::label('item_quantity', 'The number of items:')}}
{{Form::text('item_quantity',null,array('class'=>'form-control') )}}

{{Form::label('item_vendor', 'Your Name:')}}
{{Form::text('item_vendor',null,array('class'=>'form-control') )}}


<input type="text" name="item_user_id" value="{{Auth::user()->id}}" hidden>

{{Form::label('item_location', 'Your Location:')}}
{{Form::text('item_location',null,array('class'=>'form-control') )}}
<label for="category_id">Select Item Category:</label>
<select class="form-control"  name="category_id" id="">
        @foreach ($categories as $category)
        
        <option value="{{$category->id}} ">{{$category->category_title}} </option>
        @endforeach
    
</select><br>

{{Form::label('item_vendor_phone', 'Your Phone Number:')}}
{{Form::text('item_vendor_phone',null,array('class'=>'form-control') )}}

{{Form::label('item_image', 'Item Image upload:')}}
{{Form::file('item_image',null,array('class'=>'form-control') )}}

{{Form::label('item_description', 'Describe Your Item:')}}
{{Form::textarea('item_description',null,array('class'=>'form-control') )}}

{{Form::submit('Add Item', array('class'=>'btn  btn-success btn-block'))}}<br>
{!!Form::close()!!}
        </div><br><br><br>
        
        
    </div>
    <div class="col-lg-2">
        <p>Another column</p>
    </div>
</div>
            
           @stop