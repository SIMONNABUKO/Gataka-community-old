@extends('layouts.template')
@section('content') <br><br><br>
<h1 style="background-color:#51d8af; border-color:51d8af; color:white" 
class="btn btn-default">Item Display</h1>

<div class="row">
<div class="col-lg-10">
<div class="container">
    <h2>{{$category->category_name}}</h2>
<p>{{$category->category_description}}</p>
@foreach($items as $item)
{{$item->item_name}}
@endforeach

   


</div>
<div class="col-lg-2">
<p>Another column</p>
</div>
</div>
</div>

@stop