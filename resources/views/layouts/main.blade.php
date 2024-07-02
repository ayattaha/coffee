<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
  <div class="tm-container">
        <div class="tm-row">
            <!-- Site Header -->
      
              @include('includes.siteHeader')
    
                <div class="tm-right">
                    <main class="tm-main">
                    
                    <!-- content -->
                    @yield('content')
                    
                    </main>
                </div>    
        </div>
             <!-- footer -->
              @include('includes.footer')
   </div>
    
  <!-- Background video Script-->
  @include('includes.script')
</body>
</html>