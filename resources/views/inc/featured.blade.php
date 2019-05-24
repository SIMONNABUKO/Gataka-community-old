    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Items</h3>
                    </div>
                </div>
            </div>
            {{-- <div class="infinite-scroll"> --}}
            <div class="row">

                @if(count($items)>0) 
                
                 @foreach ($items as $item)
                    
              
                <div class="col-md-3 col-sm-6 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="/show/{{$item->id}}">
                            <h3 style="color:#51d8af">{{$item->item_name}}</h3>
                            <img src="{{asset('storage/images/items_images/'.$item->item_image)}}" class="img-fluid" alt="#">
                            <span class="featured-rating-orange">new</span>
                            <div class="featured-title-box">
                                
                             <p>{{$item->category->category_title}}</p>  
                                 <i class="fa fa-eye"></i>{{views($item)->count()}}
                                <p>Price: Kshs<span>{{$item->item_price}}</span></p>
                                <ul>
                                    <li>Location<i class="fa fa-location-arrow">:</i></span>
                                    <p>{{$item->item_location}}</p>
                                    </li>
                                    
                                    
                                      
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                <div class="closed-now"><a style="color:white; background-color:#51d8af;" class="btn btn-sm " href="/show/{{$item->id}}">View Phone Number</a></div>
                                    
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                
                

            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        
                            {{$items->links()}}
                          
                    </div>
                </div>
            </div>
            
            @endif
            </div>
            {{-- <script type="text/javascript">
                $('ul.pagination').hide();
                $(function() {
                    $('.infinite-scroll').jscroll({
                        autoTrigger: true,
                        loadingHtml: '<img class="center-block" src="{{asset("storage/images/spinner.gif")}}" />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                        padding: 0,
                        nextSelector: '.pagination li.active + li a',
                        contentSelector: 'div.infinite-scroll',
                        callback: function() {
                            $('ul.pagination').remove();
                        }
                    });
                });
            </script> --}}
        </div>
    </section>
    <!--//END FEATURED PLACES -->