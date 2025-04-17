<template>
  <div class="bg-light border border-1">
    <div class="container">
      <nav id="main-menu" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

          <!-- Menu items -->
          <div class="navbar-collapse d-flex justify-content-between">
            <ul class="navbar-nav flex-grow-1">
              <!-- Danh sách bài học -->
              <li class="nav-item flex-fill text-center p-3 border-start border-end border-1">
                <router-link class="nav-link" :to="{ name: 'coures' }">
                  <i class="icn-lesson"></i> Danh sách bài học
                </router-link>
              </li>

              <!-- Video -->
              <li class="nav-item flex-fill text-center p-3 border-start border-end border-1">
                <router-link class="nav-link" :to="{ name: 'chuongtrinh' }">
                  <i class="icn-video"></i> Video
                </router-link>
              </li>

              <!-- Chữ cái tiếng Nhật -->
              <li class="nav-item flex-fill text-center p-3 border-start border-end border-1">
                <router-link class="nav-link" :to="{ name: 'alphabet' }">
                  <i class="icn-letters"></i> Chữ cái tiếng Nhật
                  
                </router-link>
              </li>

              <!-- Các mục khác -->
              <li class="nav-item dropdown flex-fill text-center p-3 border-start border-end border-1">
                <div class="nav-link">
                  <i class="icn-segments"></i> Mục
                  <i class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3
                          0s-12.5 32.8 0 45.3l192 192z" />
                    </svg>
                  </i>
                </div>
                <ul class="dropdown-menu">
                  <li>
                    <router-link class="dropdown-item p-3" :to="{ name: 'jpsearch' }">Từ vựng</router-link>
                  </li>
                  <li>
                    <router-link class="dropdown-item p-3" :to="{ name: 'chuongtrinh' }">Mở rộng</router-link>
                  </li>
                  <li>
                    <router-link class="dropdown-item p-3" :to="{ name: 'chuongtrinh' }">Thực hàng</router-link>
                  </li>
                  <li>
                    <router-link class="dropdown-item p-3" :to="{ name: 'chuongtrinh' }">Nâng cao</router-link>
                  </li>
                  <li>
                    <router-link class="dropdown-item p-3" :to="{ name: 'converstation' }">Giao tiếp</router-link>
                  </li>
                </ul>
              </li>

              <!-- Trang này -->
              <li class="nav-item flex-fill text-center p-3 border-start border-end border-1">
                <router-link class="nav-link" :to="{ name: 'about' }">
                  <i class="icn-about"></i> Trang này
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>


</template>

<style scoped>
#main-menu{
  padding-top: 0 !important;
  padding-bottom: 0 !important;
}
#main-menu .nav-item .nav-link {
  display: flex; /* Đặt các phần tử icon và text trên cùng một dòng */
  align-items: center; /* Căn giữa icon và text theo chiều dọc */
}
.svg-icon {
  margin-bottom: 10px;
  margin-left: auto; /* Đẩy SVG về cuối hàng */
  display: inline-block;
  width: 16px; /* Kích thước SVG */
  height: 16px;
  fill: #000;
}

#main-menu .icn-letters {
  display: inline-block; /* Đảm bảo icon hiển thị cùng dòng với text */
  width: 32px;
  height: 32px;
  margin-right: 8px; /* Tạo khoảng cách giữa icon và text */
  background: url(../assets/images/icn_letters.png) no-repeat center center / 100%;
  background-size: 100%;
}
#main-menu .icn-lesson {
  display: inline-block; /* Đảm bảo icon hiển thị cùng dòng với text */
  width: 32px;
  height: 32px;
  margin-right: 8px; /* Tạo khoảng cách giữa icon và text */
  background: url(../assets/images/icn_lesson.png) no-repeat center center / 100%;
  background-size: 100%;
}
#main-menu .icn-video {
  display: inline-block; /* Đảm bảo icon hiển thị cùng dòng với text */
  width: 32px;
  height: 32px;
  margin-right: 8px; /* Tạo khoảng cách giữa icon và text */
  background: url(../assets/images/icn_video.png) no-repeat center center / 100%;
  background-size: 100%;
}
#main-menu .icn-segments {
  display: inline-block; /* Đảm bảo icon hiển thị cùng dòng với text */
  width: 32px;
  height: 32px;
  margin-right: 8px; /* Tạo khoảng cách giữa icon và text */
  background: url(../assets/images/icn_segments.png) no-repeat center center / 100%;
  background-size: 100%;
}
#main-menu .icn-about {
  display: inline-block; /* Đảm bảo icon hiển thị cùng dòng với text */
  width: 32px;
  height: 32px;
  margin-right: 8px; /* Tạo khoảng cách giữa icon và text */
  background: url(../assets/images/icn_about.png) no-repeat center center / 100%;
  background-size: 100%;
}

/* Dropdown hiển thị khi hover (màn hình lớn) */

  #main-menu .dropdown:hover .dropdown-menu {
    background: #7decc2;
    display: block;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    box-sizing: border-box;
    z-index: 1000;
  }


/* Màu nền khi hover vào dropdown item */
#main-menu .dropdown-menu .dropdown-item:hover {
  padding: 10px;
  background-color: var(--bg-green); 
  transition: background-color 0.3s, color 0.3s; 
}

/* Đổi màu nền khi hover vào thẻ li */
#main-menu .navbar-nav .nav-item:hover {
  background-color: var(--bg-green); 
  color: #000; 
  transition: background-color 0.3s, color 0.3s;
}

/* Kiểu mặc định của dropdown */
#main-menu .dropdown-menu {
  padding-top: 0 !important;
  padding-bottom: 0 !important;
  display: none; 
  background-color: #fff; 
  padding: 10px 0; 
  border: 1px solid #ddd; 
  text-align: center; 
  box-sizing: border-box; 
}

</style>
