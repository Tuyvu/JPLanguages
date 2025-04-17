<template>
    <body class="bg-white">
      <div class="container my-4">
        <h1 class="text-3xl fw-bold mb-4">Chương trình</h1>
  
        <!-- Danh sách khóa học -->
        <div class="row g-4">
          <div v-for="course in courseStore.courses" :key="course.id" class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-sm" @click="mountcourses">
              <router-link
                :to="{ name: 'coursedetail', 
                params: { slug: course.id }, 
                query: {
                  id: course.id,
                  title: course.title, 
                  description: course.description,
                  image: course.image,
                  level: course.level,
                  }
                }"
                class="btn btn-warning w-100"
              >
              <div class="card-header bg-warning text-center fw-bold">
                {{ course.title }}
              </div>
              <img :src="'http://localhost:8080/storage/images/'+course.image" class="card-img-top" :alt="course.title" />
              <div class="card-body">
                <h5 class="card-title fw-bold">{{ course.title }}</h5>
                <p class="card-text" v-html="course.description"></p>
                <button class="btn btn-warning w-100">Bắt đầu bài học</button>
              </div>
            </router-link>
            </div>
          </div>
        </div>
  
        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-4">
          <button class="btn btn-outline-dark me-2" :disabled="!courseStore.prevPageUrl" @click="changePage(courseStore.prevPageUrl)">
            ← Trước
          </button>
          <span class="align-self-center fw-bold">Trang {{ courseStore.currentPage }} / {{ courseStore.lastPage }}</span>
          <button class="btn btn-outline-dark ms-2" :disabled="!courseStore.nextPageUrl" @click="changePage(courseStore.nextPageUrl)">
            Sau →
          </button>
        </div>
      </div>
    </body>
  </template>
  
<script setup>
import { onMounted } from "vue";
import { useCourseStore } from "../../store/courses";

const courseStore = useCourseStore();
const user = JSON.parse(localStorage.getItem("user"));

const user_id = user ? user.id : null; 


onMounted(() => {
  courseStore.fetchCourses();
});
function mountcourses() {
      console.log(user_id);
}
  </script>
  