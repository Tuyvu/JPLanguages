<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img style="width: 210px; height: 60px;" class="ms-4" :src="logo" alt="logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ngôn ngữ
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tiếng anh</a></li>
              <li><a class="dropdown-item" href="#">Tiếng việt</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <em>User</em>
            </a>
            <ul class="dropdown-menu">
              <li>
                <router-link class="dropdown-item" :to="{ name: 'chuongtrinh' }">Profile</router-link>
              </li>
              <li v-if="isLoggedIn">
                <div class="dropdown-item" @click="handleLogout">Sign Out</div>
              </li>
              <div v-else>
                <li>
                  <router-link class="dropdown-item" :to="{ name: 'login' }">Login</router-link>
                </li>
                <li>
                  <router-link class="dropdown-item" :to="{ name: 'register' }">Sign up</router-link>
                </li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <Navcomponent />
</template>

<script setup>
import logo from '../../../assets/images/logo-world_rect.svg';
import Navcomponent from '../../../components/NavbarLJP.vue';
import { computed } from 'vue';
const isLoggedIn = computed(() => localStorage.getItem("user"));
import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()

const handleLogout = async () => {
  try {
    const response = await axios.post('http://localhost:8080/api/logout');

    if (response.status === 200) {
      localStorage.removeItem('user');

      router.push('/login');
    } else {
      message.value = response.data.message;
    }
  } catch (error) {
    console.error('Lỗi đăng xuất:', error)
  }
};
</script>
