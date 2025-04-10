<template>
 <body class="bg-white text-dark">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">{{courseTitle}}</h1>
                <h2 class="h4 fw-bold mb-3">Bạn sẽ học được gì?</h2>
                <p class="text-muted mb-4" v-html="courseDescription"></p>
                <h2 class="h4 fw-bold mb-3">Nội dung khóa học</h2>
                <div class="accordion" id="courseContent">
                    <div v-for="lessons in lessonsStore.lessons" :key="lessons.id" class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ lessons.title }}
                            </button>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="bg-gradient rounded p-4 text-white text-center mb-4" style="background: linear-gradient(to right, #ff5f6d, #ffc371);">
                    <img :src="'http://localhost:8080/storage/images/'+ courseImage" class="rounded mb-2" alt="Video giới thiệu khóa học">
                    <a href="#" class="text-white text-decoration-underline">Xem giới thiệu khóa học</a>
                </div>
                <div class="text-center">
                    <h2 class="display-6 text-warning fw-bold mb-3">Miễn phí</h2>
                    <button v-if="!isLoggedIn" class="btn btn-primary mb-4"  @click="checkbookCourses">Đăng ký học</button>
                    <button v-else class="btn btn-primary mb-4" @click="bookCourses">Đăng ký học</button>
                    <ul class="list-unstyled text-start">
                        <li class="d-flex align-items-center mb-2">
                            <i class="fas fa-check-circle text-muted me-2"></i>
                            Trình độ {{ courseLevel }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="fas fa-check-circle text-muted me-2"></i>
                            Tổng số {{ lessonCount }} bài học
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="fas fa-check-circle text-muted me-2"></i>
                            Học mọi lúc, mọi nơi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <modelLogin :show="showLoginModal" :courseID="courseId" @close="showLoginModal = false" />
    <modelCoursesOK :show="showCoursesModal" @close="showCoursesModal = false" />
</body>
</template>
<script setup>
import { onMounted, computed,ref } from "vue";
import { useRoute } from 'vue-router';
import { useLessonsStore } from "../../store/lessons";
import modelLogin from '../../components/modelLogin.vue';
import modelCoursesOK from '../../components/modelCoursesOk.vue';
import axios from 'axios';

const route = useRoute();
const courseTitle = route.query.title;
const courseDescription = route.query.description;
const courseImage = route.query.image;
const courseLevel = route.query.level;
const courseId = route.query.id;
const lessonsStore = useLessonsStore();
const showLoginModal = ref(false);
const showCoursesModal = ref(false);

onMounted(() => {
    lessonsStore.fetchLessons(courseId);
});
const lessonCount = computed(() => lessonsStore.lessons.length);
const isLoggedIn = computed(() => localStorage.getItem("user"));

const checkbookCourses = () => {
  showLoginModal.value = true;
};
const checkCoursesOK = () => {
    showCoursesModal.value = true;
};
const bookCourses = () => {
    const user = JSON.parse(localStorage.getItem("user"));
        // Gọi API để đăng ký khóa học
        console.log("Đăng ký khóa học với ID:", courseId, "và User ID:", user.id);
        axios.post('http://localhost:8080/api/courses/bookcourses', {
        courseId: courseId,
        userId: user.id
        })
        .then(response => {
        if (response.status === 200) {
            checkCoursesOK();
        }else {
            alert("Đăng ký khóa học thất bại!");
        }
        })
        .catch(error => {
        console.error("Lỗi khi gọi API:", error);
        });
};
</script>