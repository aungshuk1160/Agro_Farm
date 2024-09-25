<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  <span style="font-family: 'Poppins', sans-serif;">products</span>
               </h2><br><br>

                  <div class="row justify-content-end">
                     <form action="{{ url('search') }}" method="GET" >
                        @csrf
                        
                        <div class="input-group">
                           <input style="width:500px; border-radius:10px; height:45px" type="search" name="search" class="form-control" placeholder="Search" aria-label="Search">
                           <div class="input-group-append">
                             <button style="border-radius:10px"class="btn btn-secondary" type="submit">Go</button>
                           </div>
                        </div>
                     </form>
                  </div>

            </div><br>

            <div class="row">

               @foreach($product as $product)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">

                     <div class="option_container">
                        <div class="options">
                           <a href="{{ url('view_product_details', $product->id )}}" class="option1">
                           View details
                           </a>
                           <!-- add to cart start -->
                           <form action="{{url('add_cart', $product->id)}}" method="Post">
                              @csrf

                              <div class= "row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:80px">
                                 </div>
                                 <div class="col-md-4" >
                                    <input type="submit" value="Add To Cart" style="border-radius: 30px">
                                 </div>
                              </div>

                           </form>
                           <!-- add to cart end -->
                        </div>
                     </div>

                     <div class="img-box">
                        <img src="product/{{ $product->image }}" alt="">
                     </div>

                     <div class="detail-box">
                        <h5>
                        {{ $product->name }}
                        </h5>
                        <h6>
                        Tk. {{ $product->price }}
                        </h6>
                     </div>
                     
                  </div>
               </div>
               
               @endforeach  
            </div>
         </div> <br><br>
      </section>
