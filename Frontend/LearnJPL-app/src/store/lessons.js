import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useLessonsStore = defineStore("lessonsStore", () => {
  const lessons = ref([]);
  const currentPage = ref(1);
  const lastPage = ref(1);
  const prevPageUrl = ref(null);
  const nextPageUrl = ref(null);
  const lastFetchedTime = ref(null); // thời điểm fetch gần nhất

  const fetchLessons = async (courseId) => {
    try {
      const url = `http://localhost:8080/api/courses/${courseId}/lessons`; 
      const response = await axios.get(url);

      lessons.value = response.data.data;
      currentPage.value = response.data.current_page;
      lastPage.value = response.data.last_page;
      prevPageUrl.value = response.data.prev_page_url;
      nextPageUrl.value = response.data.next_page_url;
      lastFetchedTime.value = Date.now(); // Cập nhật thời gian fetch
    } catch (error) {
      console.error("Lỗi khi lấy danh sách bài học:", error);
    }
  };

  return {
    lessons,
    currentPage,
    lastPage,
    prevPageUrl,
    nextPageUrl,
    lastFetchedTime,
    fetchLessons,
  };
}, {
  persist: true, // Bật lưu vào localStorage
});
