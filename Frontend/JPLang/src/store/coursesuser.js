import { defineStore } from "pinia";
import { ref } from "vue";
import axiosInstance from '../plugins/axios';



export const useCourseStore = defineStore("courseStore", () => {
  const courses = ref([]);
  const currentPage = ref(1);
  const lastPage = ref(1);
  const prevPageUrl = ref(null);
  const nextPageUrl = ref(null);
  const user = JSON.parse(localStorage.getItem("user"));

  const fetchCourses = async (url = `/courses_user/${user.id}`) => {
    try {
      const response = await axiosInstance.get(url);
      courses.value = response.data.data;
      currentPage.value = response.data.current_page;
      lastPage.value = response.data.last_page;
      prevPageUrl.value = response.data.prev_page_url;
      nextPageUrl.value = response.data.next_page_url;
    } catch (error) {
      console.error("Lỗi khi lấy danh sách khóa học:", error);
    }
  };

  return {
    courses,
    currentPage,
    lastPage,
    prevPageUrl,
    nextPageUrl,
    fetchCourses,
  };
});
