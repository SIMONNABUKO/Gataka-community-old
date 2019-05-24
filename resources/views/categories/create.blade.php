
            @extends('layouts.template')
            @section('content') <br><br><br>
            <h1 style="background-color:#51d8af; border-color:51d8af; color:white" 
            class="btn btn-default">Sell Your Item</h1>
            
<div class="row">
    <div class="col-lg-10">
        <div class="container">

{!! Form::open(array('action'=>'CategoriesController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'))!!}
{{Form::label('category_title', 'Category Title:')}}
{{Form::text('category_title',null,array('class'=>'form-control') )}}

{{Form::label('category_slug', 'Category Slug:')}}
{{Form::text('category_slug',null,array('class'=>'form-control') )}}


{{Form::label('category_image', 'Category Image uload:')}}
{{Form::file('category_image',null,array('class'=>'form-control') )}}

{{Form::label('category_description', 'Category Description:')}}
{{Form::textarea('category_description',null,array('class'=>'form-control') )}}

{{Form::submit('Add Category', array('class'=>'btn btn-sm btn-success btn-block'))}}<br>
{!!Form::close()!!}
        </div><br><br><br>
        
        
    </div>
    <div class="col-lg-2">
        <p>Another column</p>
    </div>
</div>
            
           @stop