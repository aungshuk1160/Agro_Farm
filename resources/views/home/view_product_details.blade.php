<!DOCTYPE html>
<html>
   <head>
      <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      
      <title>AgroFarm</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      

      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <!-- CSS for Modal and Overlay -->
      <style>
         /* The Modal (background overlay) */
         
         .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); 
            justify-content: center;
            align-items: center;
            align: center;
         }

        
         .modal-content {
            background-color: #000;
            padding: 20px;
            
            text-align: center;
         }

        
         .modal-content video {
            display: block;
            margin: 0 auto;
         }

         
         .close-btn {
            margin-top: 15px;
            align-self: center;
            width: 80px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 35px;
            cursor: pointer;
         }

         .close-btn:hover {
            background-color: #d32f2f;
         }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

         

            <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding: 60px; width: 60%;">
                  <div class="box">
                     <div style="display: flex; justify-content: center; align-items: center; padding: 30px;">
                        <img src="product/{{ $product->image }}" alt="" style="max-width: 100%; height: auto;">                           
                     </div>

                     <div class="detail-box" style="text-align: center; font-family: 'Poppins', sans-serif;">
                        
                        <h5>
                        Item: {{ $product->name }}
                        </h5>
                        <h5>
                        Price: Tk. {{ $product->price }}
                        </h5>

                        @if($product->video)
                           <button class="btn btn-secondary" style="background-color: #212121; width: 100px; border-radius: 20px; font-size: 14px;" onclick="playVideo('{{ asset('product/' . $product->video) }}')">View Video</button>
                        @endif
                     </div>

                     <br>
                     <form action="{{url('add_cart', $product->id)}}" method="Post">
                              @csrf

                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                           <div class="col-md-4">
                             <input type="number" name="quantity" value="1" min="1" style="width:100px">
                           </div>
                           <div class="col-md-4">
                             <input type="submit" value="Add To Cart" style="border-radius: 20px">
                           </div>
                        </div>

                     </form>

                  </div>
            </div>

            <div class="product">              

               <!-- video modal -->
               <div id="videoModal" class="modal">
                  <div class="modal-content">
                        <video id="productVideo" width="600" controls>
                           <source id="videoSource" src="" type="video/mp4">
                           Your browser does not support the video tag.
                        </video>
                        <br>
                        <button class="close-btn" onclick="closeVideo()">Close</button>
                  </div>
               </div>
            </div>

         <script>
            // to play video
            function playVideo(videoUrl) {
               document.getElementById('videoSource').src = videoUrl;
               document.getElementById('productVideo').load();
               document.getElementById('videoModal').style.display = 'block';
            }

            // this is to close the modal
            function closeVideo() {
               document.getElementById('productVideo').pause();
               document.getElementById('videoModal').style.display = 'none';
            }
         </script>

         
        </div>
      


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      

   </body>
</html>