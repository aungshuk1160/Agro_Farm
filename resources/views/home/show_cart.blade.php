<!DOCTYPE html>
<html>
   <head>
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
   
   
   
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" style="align: center; background-color: white; width: 500px;" role="alert">
                <h4 class="text-center">{{Session::get('message')}}</h4>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

         <div class="table-responsive custom-margin mt-4 text-center">
                <table class="table table-bordered mx-auto" style="width: 80%;">
                    <thead style="background-color: #5b9671; color: black;"> 
                        <tr>
                            <th style="font-size: 1.1em; font-weight: bold;">Name</th>
                            <th style="font-size: 1.1em; font-weight: bold;">Price (Tk.)</th>
                            <th style="font-size: 1.1em; font-weight: bold;">Quantity</th>
                            <th style="font-size: 1.1em; font-weight: bold;">Image</th>
                            <th style="font-size: 1.1em; font-weight: bold;">Action</th>
                        </tr>
                    </thead>

                        <?php $totalprice=0; ?>

                    <tbody>

                    @foreach($cart as $cart)

                    <tr> 
                        <td style="font-size: 1.1em; font-weight: bold; vertical-align: middle;">{{ $cart->product_name }}</td>
                        <td style="font-size: 1.1em; font-weight: bold; vertical-align: middle;">{{ $cart->price }}</td>
                        <td style="font-size: 1.1em; font-weight: bold; vertical-align: middle;">{{ $cart->quantity }}</td>
                        <td style="vertical-align: middle;"><img src="/product/{{ $cart->image }}" alt="" width="100"></td>
                        <td style="vertical-align: middle;">
                            <a href="{{url('remove_cart', $cart->id)}}" onClick="return confirm('Are you sure you want to remove this?')" class="btn btn-danger">Remove Item</a>
                        </td>
                    </tr>

                    <?php $totalprice=$totalprice + $cart->price * $cart->quantity ?>

                    @endforeach

                    </tbody>
                </table>
            </div>

            <br>

            <div style="display: flex; justify-content: center; align-items: center; background-color: #5b9671; border-radius: 35px; padding: 10px; margin: 20px auto; width: 20%; height: 90px;">
                <h4 style="margin: 0; font-weight: bold;">Total: Tk. {{$totalprice}}</h4>
            </div>

            <br>
            <div style="display: flex; justify-content: center; gap: 20px;">
                <a href="{{url('cash_order')}}" class="btn btn-primary" style="background-color: #5b9671; border-radius: 20px;border: none; padding: 15px 30px; font-size: 1.2em;">Cash Payment</a>
                <a href="{{url('stripe', $totalprice)}}" class="btn btn-primary" style="border-radius: 20px;background-color: #5b9671; border: none; padding: 15px 30px; font-size: 1.2em;">Card Payment</a>
            </div><br><br><br>

       </div>

    </div>
      
 

         
      
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