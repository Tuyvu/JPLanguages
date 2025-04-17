import { defineStore } from "pinia";
import { ref } from "vue";
import axiosInstance from '../plugins/axios';



export const useLessonsStore = defineStore("lessonsStore", () => {
  const lessons = ref([]);
  const currentPage = ref(1);
  const courseId = ref([]);
  const lastPage = ref(1);
  const prevPageUrl = ref(null);
  const nextPageUrl = ref(null);
  const lastFetchedTime = ref(null); // thời điểm fetch gần nhất

  const fetchLessons = async (courseid) => {
    try {
      courseId.value = parseInt(courseid); // Lưu courseId vào store
      const url = `/courses/${courseid}/lessons`; 
      const response = await axiosInstance.get(url);

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
    courseId,
    fetchLessons,
  };
}, {
  persist: true, // Bật lưu vào localStorage
});
