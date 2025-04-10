<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="{{route('admin.index')}}" class="logo">
            <span>
                <img src="{{asset('assets')}}/img/logo/logo.png" alt="logo-small" class="logo-sm">
            </span>
            {{-- <span class="">
                <img src="{{asset('admin-asset')}}/assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                {{-- <img src="{{asset('admin-asset')}}/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark"> --}}
            {{-- </span> --}}
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu" >
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label pt-0 mt-0">
                        <!-- <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small> -->
                        <span>Main Menu</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.index')}}">
                            <i class="iconoir-home-simple menu-icon"></i>
                            <span>Thống kê</span>
                        </a><!--end startbarDashboards-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarApplications" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarApplications">
                            <i class="iconoir-view-grid menu-icon"></i>
                            <span>Cửa hàng</span>
                        </a>
                        <div class="collapse " id="sidebarApplications">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false" aria-controls="sidebarAnalytics">                                        
                                        <span>Quản lý</span>
                                    </a>
                                    <div class="collapse " id="sidebarAnalytics">
                                        <ul class="nav flex-column">
                                            
                                            <li class="nav-item">
                                                <a href="{{ route('courses.index') }}" class="nav-link ">Thêm khóa học</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('lessons.index') }}" class="nav-link ">Thêm bài học</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('tests.index') }}" class="nav-link ">Thêm bài bài kiểm tra</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('customer.index') }}" class="nav-link ">Người học</a>
                                            </li><!--end nav-item-->

                                        </ul><!--end nav-->
                                    </div>
                                </li><!--end nav-item-->                                
                                <!--end nav-item-->                                
                            </ul><!--end nav-->
                        </div><!--end startbarApplications-->
                    </li>
            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->    
</div>
