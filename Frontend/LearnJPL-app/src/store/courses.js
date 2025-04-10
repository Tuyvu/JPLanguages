import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useCourseStore = defineStore("courseStore", () => {
  const courses = ref([]);
  const currentPage = ref(1);
  const lastPage = ref(1);
  const prevPageUrl = ref(null);
  const nextPageUrl = ref(null);

  const fetchCourses = async (url = "http://localhost:8080/api/courses") => {
    try {
      const response = await axios.get(url);
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
