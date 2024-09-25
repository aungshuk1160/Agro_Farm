<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AgroFarm</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="admin/assets/images/favicon.png" />-->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="text-align: center;">

            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4>{{Session::get('message')}}</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h3>Edit Product Info</h3><br>
            <form action="{{url('/update_product', $product->id)}}" method="POST" enctype="multipart/form-data" style="text-align: left; margin: 0 auto; max-width: 400px;">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label>Product Name:</label><br>
                    <input type="text" name="name" required style="width: 100%;" value="{{$product->name}}">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>Product Price:</label><br>
                    <input type="number" name="price" required style="width: 100%;" value="{{$product->price}}">
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Product Category:</label><br>
                    <select name="category" required style="width: 100%;" value="{{$product->category}}">
                        @foreach($category as $category)
                            <option>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Product Quantity:</label><br>
                    <input type="number" name="quantity" required style="width: 100%;" value="{{$product->quantity}}">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>Product Image:</label><br>
                    <input type="file" name="image" accept="image/*">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>Product Video:</label><br>
                    <input type="file" name="video" accept="video/*">
                </div>

                <button type="submit" style="display: block; margin: 0 auto; background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                    Save changes
                </button>
                <style>
                    button:hover {
                        background-color: #0056b3;
                    }
                </style>
            </form>

        
        </div>       
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
