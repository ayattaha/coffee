<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.admin.headAdmin')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beverages Admin</span></a>
                </div>
                
                <div class="clearfix"></div>
                
                <!-- menu profile quick info -->
                @include('includes.admin.menuProfile')
                <!-- /menu profile quick info -->
                
                <br />
                
                <!-- sidebar menu -->
                @include('includes.admin.sidebarMenu')
                <!-- /sidebar menu -->
                
                <!-- /menu footer buttons -->
                @include('includes.admin.menuFooter')
                <!-- /menu footer buttons -->
            </div>
        </div>
        
        <!-- top navigation -->
        @include('includes.admin.topNav')
        <!-- /top navigation -->
        
        <!-- page content -->
        @yield('content')
        <!-- /page content -->
        
        <!-- footer content -->
        @include('includes.admin.footerAdmin')
        <!-- /footer content -->
    </div>
</div>
 <!-- /footer script -->
 @include('includes.admin.footerScript')
</body>
</html>
