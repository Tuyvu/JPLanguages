<template>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row login-container bg-white shadow rounded p-4">
      <div class="col-md-6 login-form">
        <router-link :to="{ name:'coures' }">
          <img :src="logo" alt="F8 logo" class="me-auto" height="50" width="50">
        </router-link>
        <h2 class="fw-bold my-4">Đăng nhập NHK</h2>
        <form>
          <div class="mb-3">
            <label for="username" class="form-label">Email</label>
            <input v-model="form.email" type="email" class="form-control" id="username" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input v-model="form.password" type="password" class="form-control" id="password" placeholder="Mật khẩu">
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="#" class="text-decoration-none text-success">Quên mật khẩu?</a>
          </div>
          <div class="d-grid mb-4">
            <button type="button" class="btn btn-success" @click="handleLogin">Log In</button>
          </div>
          <p class="text-center text-muted mb-4">Đăng nhập với</p>
          <div class="d-flex justify-content-center">
            <a href="#" class="text-decoration-none text-primary mx-2"><i class="fab fa-facebook-f">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                  <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993"
                    y2="40.615" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#2aa4f4"></stop>
                    <stop offset="1" stop-color="#007ad9"></stop>
                  </linearGradient>
                  <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)"
                    d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path>
                  <path fill="#fff"
                    d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z">
                  </path>
                </svg></i>
            </a>
            <a href="#" class="text-decoration-none text-info mx-2"><i class="fab fa-twitter">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                  <path fill="#03A9F4"
                    d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                  </path>
                </svg></i>
            </a>
            <a href="#" class="text-decoration-none text-danger mx-2"><i class="fab fa-google">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                  <path fill="#FFC107"
                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                  </path>
                  <path fill="#FF3D00"
                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                  </path>
                  <path fill="#4CAF50"
                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                  </path>
                  <path fill="#1976D2"
                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                  </path>
                </svg></i>
            </a>
          </div>
          <div>
            <p class="text-end mx-3">
              <router-link :to="{ name: 'register' }" class="text-decoration-none text-primary mx-2">
                Đăng ký
              </router-link>
            </p>
          </div>
        </form>
      </div>
      <div class="col-md-6 login-image d-flex align-items-center justify-content-center">
        <img src="https://storage.googleapis.com/a1aa/image/vef3tTzUf2xxJuiezgSRuJwWkrTmm0nq7yIF-zbWpo8.jpg"
          alt="Illustration of a person using multiple devices including a laptop, tablet, and smartphone"
          class="img-fluid">
      </div>
    </div>
  </div>
</template>
 <script setup>
 import { ref } from 'vue';
 import { useRouter } from 'vue-router';
 import axiosInstance from '../../plugins/axios';
 import logo from '../../assets/images/logo-world_rect.svg';
 
 // Form data and message state
 const form = ref({
   firstname: '',
   lastname: '',
   email: '',
   password: '',
 });
 const message = ref('');
 const router = useRouter();
 
 // Handle login
 const handleLogin = async () => {
   try {
     const { email, password } = form.value;
     const response = await axiosInstance.post('/login', { email, password });
 
     if (response.status === 200) {
       // Lưu session trên frontend (LocalStorage)
       localStorage.setItem('user', JSON.stringify(response.data.user));
 
       router.push('/');
     } else {
       message.value = response.data.message;
     }
   } catch (error) {
     message.value = error.response?.data?.message || 'An error occurred.';
   }
 };
 </script>