

<!-- SLIDER -->
<section   class="slider d-flex align-items-center">


        {{-- style=" background: url({{asset('storage/images/gataka-online-shop.jpg')}}) no-repeat;" --}}
    <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="slider-title_box">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="slider-content_wrap">
                                <h1 >Everything you are looking for in Gataka is here!!</h1>
                                <h5 >Buying or selling? Looking for a house? Looking for a Shop or Hotel? All are here!</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            
            {!! Form::open(array('action' => 'ItemsController@search', 'class'=>'form navbar-form navbar-right searchform', 'method'=>'GET')) !!}
            {!! Form::text('search', null,
                                   array('required',
                                        'class'=>'form-control',
                                        'placeholder'=>'Search for  anything...')) !!}
             {!! Form::submit('Search',
                                        array('class'=>'btn btn-light h2 btn-block')) !!}
         {!! Form::close() !!}
                            {{-- <div class="slider-link">
                                <a href="#">Browse Popular</a><span>or</span> <a href="#">Recently Added</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// SLIDER -->