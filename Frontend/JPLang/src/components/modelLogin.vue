<template>
    <div v-if="show" class="modal fade show d-block" tabindex="-1" style="background: rgba(0, 0, 0, 0.5);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <img :src="logo" alt="F8 logo" class="me-auto" height="40" width="40" style="width: 40%;">
            <button type="button" class="btn-close" @click="$emit('close')" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <h2 class="h4 fw-bold text-dark mb-3">Đăng nhập vào NHK</h2>
            <p class="text-danger mb-4">Mỗi người nên sử dụng riêng một tài khoản, tài khoản nhiều người
                sử dụng chung sẽ bị khóa.</p>
            <div class="d-grid gap-3">
                <router-link class="btn btn-outline-secondary" :to="{ name: 'login' }">
                    <button>
                      <i class="fas fa-user me-2"></i> Sử dụng email / số điện thoại
                    </button>
                </router-link>
              <button class="btn btn-outline-secondary" @click="loginGoogle">
                <i class="fab fa-google me-2"></i> Đăng nhập với Google
              </button>
              <button class="btn btn-outline-secondary" @click="loginFacebook">
                <i class="fab fa-facebook me-2"></i> Đăng nhập với Facebook
              </button>
            </div>
            <div class="mt-4">
                <router-link :to="{ name: 'register' }">
                    <p class="text-muted">Bạn chưa có tài khoản? <a href="#" class="text-danger">Đăng ký</a></p>
                </router-link>
              <p class="text-muted"><a href="#" class="text-danger">Quên mật khẩu?</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
    import logo from '../assets/images/logo-world_rect.svg';
    // import logo from '../../assets/images/logo-world_rect.svg';
  defineProps(["show"]);
  </script>
  