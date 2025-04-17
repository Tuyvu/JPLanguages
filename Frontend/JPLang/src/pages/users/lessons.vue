<template>
    <body class="bg-white">
      <div class="container my-4">
        <h1 class="text-3xl fw-bold mb-4">khóa học </h1>
        <button class="my-2">
          <router-link class="btn btn-dark me-2" :to="{ name: 'coures' }">Trở lại</router-link>
        </button>
        
        <!-- Danh sách khóa học -->
        <div class="row g-4">
          <div v-for="lessons in lessonsStore.lessons" :key="lessons.id" class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-sm">
              <router-link
                :to="{ name: 'lessondetail', params: { slug: lessons.id }, query: { course_id: lessonsStore.courseId } }"
                class="btn btn-warning w-100"
              >
              <div class="card-header bg-warning text-center fw-bold">
                {{ lessons.title }}
              </div>
              <img :src="'http://localhost:8080/storage/images/ht.png'" class="card-img-top" :alt="lessons.title" />
              <div class="card-body">
                <h5 class="card-title fw-bold">{{ lessons.title }}</h5>
                <p class="card-text" v-html="lessons.content"></p>
                <button class="btn btn-warning w-100">Bắt đầu bài học</button>
              </div>
            </router-link>
            </div>
          </div>
        </div>
  
        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-4">
          <button class="btn btn-outline-dark me-2" :disabled="!lessonsStore.prevPageUrl" @click="changePage(lessonsStore.prevPageUrl)">
            ← Trước
          </button>
          <span class="align-self-center fw-bold">Trang {{ lessonsStore.currentPage }} / {{ lessonsStore.lastPage }}</span>
          <button class="btn btn-outline-dark ms-2" :disabled="!lessonsStore.nextPageUrl" @click="changePage(lessonsStore.nextPageUrl)">
            Sau →
          </button>
        </div>
      </div>
    </body>
  </template>
  
  <script setup>
  import { onMounted } from "vue";
  import { useLessonsStore } from "../../store/lessons";
  import { useRoute } from "vue-router";
  
  const route = useRoute();
  const lessonsStore = useLessonsStore();

  // console.log(lessonsStore.courseId);
  
  onMounted(() => {
    const slug = route.params.slug;
    lessonsStore.fetchLessons(slug);
  });
  </script>
  