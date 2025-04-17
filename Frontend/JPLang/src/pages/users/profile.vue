<template>

    <body class="bg-light">
        <main class="container my-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="bg-white p-4 rounded shadow-sm text-center">
                        <img src="https://storage.googleapis.com/a1aa/image/f8pPhHrCoBfvEJlo5I3g1_7nv51bU9JzbgGuEL21mn0.jpg"
                            alt="Profile Picture" class="img-fluid rounded-circle" style="height: 100px; width: 100px;">
                        <h2 class="mt-3">{{user.firstname + user.lastname}}</h2>
                        <p class="text-muted">{{ user.email }}</p>
                        <button class="btn btn-outline-secondary mt-3">Theo dõi</button>
                        <div class="mt-4">
                            <p class="text-muted"><i class="fas fa-users"></i> 23 người theo dõi · 0 đang theo dõi</p>
                            <p class="text-muted"><i class="fas fa-calendar-alt"></i> Tham gia F8 từ 3 năm trước</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="bg-white p-4 rounded shadow-sm mb-4">
                        <!-- heatmap -->
                        <div class="heatmap">
                            <CalendarHeatmap :values="heatmapData" :start-date=startDate :end-date=endDate
                                :range-color="['#ebedf0', '#9be9a8', '#40c463', '#30a14e', '#216e39']" />
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <select class="form-select w-auto" v-model="selectedYear" @change="getYear">
                                <option v-for="year in years" :key="year" :value="year">
                                    {{ year }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded shadow-sm">
                        <h3>Khóa học đã đăng ký ({{ courseStore.courses.length }})</h3>
                        <div class="row g-4">
                            <div v-for="course in courseStore.courses" :key="course.id"
                                class="col-12 col-md-6 col-lg-3">
                                <div class="card shadow-sm" @click="mountcourses">
                                    <router-link :to="{ name: 'coursedetail', 
                                        params: { slug: course.id }, 
                                        query: {
                                        id: course.id,
                                        title: course.title, 
                                        description: course.description,
                                        image: course.image,
                                        level: course.level,
                                        }
                                        }" class="btn btn-warning w-100">
                                        <div class="card-header bg-warning text-center fw-bold">
                                            {{ course.title }}
                                        </div>
                                        <img :src="'http://localhost:8080/storage/images/'+course.image"
                                            class="card-img-top" :alt="course.title" />
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
                            <button class="btn btn-outline-dark me-2" :disabled="!courseStore.prevPageUrl"
                                @click="changePage(courseStore.prevPageUrl)">
                                ← Trước
                            </button>
                            <span class="align-self-center fw-bold">Trang {{ courseStore.currentPage }} / {{
                                courseStore.lastPage }}</span>
                            <button class="btn btn-outline-dark ms-2" :disabled="!courseStore.nextPageUrl"
                                @click="changePage(courseStore.nextPageUrl)">
                                Sau →
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</template>
<script setup>
import { useCourseStore } from "../../store/coursesuser";
import { ref, onMounted } from 'vue';
import axiosInstance from '../../plugins/axios';
const now = new Date();

const pastDate = new Date(now);
    pastDate.setFullYear(pastDate.getFullYear() - 1);
const start = pastDate.toISOString().split('T')[0];

const heatmapData = ref([]);
const selectedYear = ref(now.getFullYear());
const startDate = ref(`${start}`);  
const endDate = ref(`${now}`);
const user = JSON.parse(localStorage.getItem('user'));
const startDatenow = now.getFullYear()-3;
const endDatenow = now.getFullYear();
const years = ref(Array.from({ length: endDatenow - startDatenow + 1 }, (_, i) => startDatenow + i))
onMounted(async () => {    
  try {
    const res = await axiosInstance.get(`/profile/${user.id}`);
    console.log(startDate);

    heatmapData.value = res.data.map(item => ({
      date: item.date,
      count: item.votes
    }));
    
    console.log(heatmapData.value);
  } catch (error) {
    console.error(error);
  }
});

const getYear = (event) => {
    if(event.target.value == now.getFullYear()){
        startDate.value = start;
        endDate.value = now;
    }else{
        startDate.value = event.target.value + '-01-01';
        endDate.value = event.target.value + '-12-31';
        console.log(startDate,endDate);
    }
};
const courseStore = useCourseStore();

onMounted(() => {
  courseStore.fetchCourses();
});

</script>

