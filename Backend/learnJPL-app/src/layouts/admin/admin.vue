<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img style="width: 210px; height: 60px;" class="ms-4" :src="logo" alt="logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'truongtrinh' }">Chương trình</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'truongtrinh' }">Giới thiệu</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liên hệ</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Ngôn ngữ
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tiếng anh</a></li>
              <li><a class="dropdown-item" href="#">Tiếng việt</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <em>User</em>
            </a>
            <ul class="dropdown-menu">
              <li>
                <router-link class="dropdown-item" :to="{ name: 'truongtrinh' }">Profile</router-link>
              </li>
              <li>
                <router-link class="dropdown-item" :to="{ name: 'truongtrinh' }">Sign Out</router-link>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <Navcomponent />
  </div>
  <router-view></router-view>
</template>

<script setup>
import logo from '../../assets/images/logo-world_rect.svg';
import Navcomponent from '../../components/Nav.vue';
</script>
