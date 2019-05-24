@extends('layouts.app')
@section('content') <br><br>
<ol>
@foreach ($categories as $category)
   <li> {{$category->category_title}}</li>
@endforeach
</ol> 
@stop()

