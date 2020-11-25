<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('dashboard.partials.htmlheader-dashboard')
@show
<body class=" ">
  <div class="wrapper ">
      <!-- sidebar -->
      @include('dashboard.partials.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('dashboard.partials.navbar-dashboard')
      <!-- End Navbar -->
        @yield('main-content')
      <!-- footer -->
      @include('dashboard.partials.footer-dashboard')
      </div>
    </div>
    <!--   Core JS Files   -->
    @section('scripts')
        @include('product.partials.scripts-product')
    @show  
</body>
</html>