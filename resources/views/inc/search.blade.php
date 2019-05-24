    <!--============================= FIND PLACES =============================-->
    <section class="main-block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="styled-heading">
                            <h3>Which category do you need to find?</h3>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        
                     @if(count($categories)>0)
                    @foreach ($categories as $category) 
                        
                       <div class="col-lg-3 col-xs-6 col-sm-6">
                     <img src="{{asset('storage/images/category_images/'.$category->category_image)}}" class="img-responsive img-thumbnail" style="width:100%" alt="Image"> 
                      <a href="/categories/show/{{$category->id}}"><h2 style="background-color:#51d8af; color:white;" class="btn btn-block">{{$category->category_title}} <span class="badge badge-danger"> {{$category->item->count()}}</span></h2></a> 
                            </div>
                            @endforeach 

                    @endif 
                          </div>
                        </div><br>
            </div>
        </section>
        <!--//END FIND PLACES -->