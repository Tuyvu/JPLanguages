<template>
    <div v-if="show" class="modal fade show d-block" tabindex="-1" style="background: rgba(0, 0, 0, 0.5);">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <img :src="logo" alt="F8 logo" class="mx-auto" height="50" width="300">
            <button type="button" class="btn-close" @click="$emit('close')" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="row login-container">
  
          <div class="col-md-6 login-form">
      
            <h4 class="fw-bold text-center text-secondary my-5">Chúc bạn có những giờ học tập hiệu quả >.<</h4>
              <div class="d-grid mb-4">
                <router-link :to=" {name: 'lessonCourse',params: { slug: courseID }}" class="btn btn-success" >Bắt đầu</router-link>
                
              </div>
          </div>
          <div class="col-md-6 login-image d-flex align-items-center justify-content-center">
            <img :src="'http://localhost:8080/storage/images/ht.png'"
              alt="Illustration of a person using multiple devices including a laptop, tablet, and smartphone"
              class="img-fluid">
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
    import logo from '../assets/images/logo-world_rect.svg';
    // import logo from '../../assets/images/logo-world_rect.svg';
    defineProps(["show", "courseID"]);
  </script>
  