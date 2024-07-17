<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
<div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Wave Cafe</h1>
          </div>
              <nav class="tm-site-nav">
                    <!-- Site Header -->
      
                    @include('includes.siteHeader')
              </nav>
        </div>        
      </div>
                <div class="tm-right">
                    <main class="tm-main">
                    <div id="drink" class="tm-page-content">
                    <!-- content -->
                    @yield('content')
                    </div>
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