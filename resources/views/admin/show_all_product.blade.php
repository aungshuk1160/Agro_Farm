<!DOCTYPE html>
<html lang="en">
  <head>
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
  
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="text-center">{{Session::get('message')}}</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive custom-margin mt-4">
                    <table class="table table-bordered text-center">
                        <thead style="background-color: #f8f9fa;"> 
                            <tr>
                                <th style="font-size: 1.1em;">Name</th>
                                <th style="font-size: 1.1em;">Price (Tk.)</th>
                                <th style="font-size: 1.1em;">Category</th>
                                <th style="font-size: 1.1em;">Quantity</th>
                                <th style="font-size: 1.1em;">Image</th>
                                <th style="font-size: 1.1em;">Video</th>
                                <th style="font-size: 1.1em;">Delete</th>
                                <th style="font-size: 1.1em;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $product)
                            <tr> 
                                <td style="font-size: 1.1em;">{{ $product->name }}</td>
                                <td style="font-size: 1.1em;">{{ $product->price }}</td>
                                <td style="font-size: 1.1em;">{{ $product->category }}</td>
                                <td style="font-size: 1.1em;">{{ $product->quantity }}</td>
                                <td><img src="/product/{{ $product->image }}" alt="" width="100"></td>
                                <td><a href="/product/{{ $product->video }}" style="font-size: 1.1em;">Watch</a></td>
                                
                                <td>
                                    <a href="{{url('delete_product', $product->id)}}" onClick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <a href="{{url('edit_product', $product->id)}}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

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
