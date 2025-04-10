<template>
  <div class="container my-4">
    <h1 class="text-3xl fw-bold mb-4">{{ lesson?.title || "Bài học" }}</h1>
    <!-- <section id="video-block" class="ratio ratio-16x9">
        <iframe :src="getEmbedUrl(lesson.video_url)" 
                title="Toàn bài" allowfullscreen>
        </iframe>
    </section> -->
    <section id="video-block" class="ratio ratio-16x9">
      <div id="youtube-player"></div>
    </section>

    <p class="btn-ondemand my-2 mt-3">
      <router-link v-if="prevLesson" class="btn btn-primary"
        :to="{ name: 'lessondetail', params: { slug: prevLesson.id } }">
        Bài trước
      </router-link>
      <router-link v-if="nextLesson" class="btn btn-primary mx-2"
        :to="{ name: 'lessondetail', params: { slug: nextLesson.id } }" :class="{ disabled: !isCompleted }"
        @click="!isCompleted && alert('Bạn cần xem ít nhất 70% video để tiếp tục')">
        Bài tiếp
      </router-link>
    </p>
  </div>
</template>

<script setup>
import { onMounted, computed, watch, nextTick, ref } from "vue";
import { useRoute } from "vue-router";
import { useLessonsStore } from "../../store/lessons";
import axios from 'axios';

const route = useRoute();
const lessonsStore = useLessonsStore();
const courseId = route.query.course_id;
const user = JSON.parse(localStorage.getItem("user"));
const userId = user.id;

const lesson = computed(() =>
  lessonsStore.lessons.find((l) => l.id === parseInt(route.params.slug))
);

const prevLesson = computed(() => {
  const index = lessonsStore.lessons.findIndex((l) => l.id === parseInt(route.params.slug));
  return index > 0 ? lessonsStore.lessons[index - 1] : null;
});

const nextLesson = computed(() => {
  const index = lessonsStore.lessons.findIndex((l) => l.id === parseInt(route.params.slug));
  return index < lessonsStore.lessons.length - 1 ? lessonsStore.lessons[index + 1] : null;
});

let player = null;
let isCompleted = ref(false);
let watchedTime = 0;
let watchInterval = null;

const loadYouTubeAPI = () => {
  return new Promise((resolve) => {
    if (window.YT) return resolve();
    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    window.onYouTubeIframeAPIReady = () => resolve();
    document.body.appendChild(tag);
  });
};

const initPlayer = () => {
  const videoId = lesson.value.video_url.split("v=")[1];
  player = new YT.Player("youtube-player", {
    height: "390",
    width: "640",
    videoId: videoId,
    events: {
      onStateChange: onPlayerStateChange,
    },
  });
};

const onPlayerStateChange = (event) => {
  if (event.data === YT.PlayerState.PLAYING) {
    checkProgress();
  }
};

const checkProgress = () => {
  clearInterval(watchInterval);
  watchInterval = setInterval(() => {
    if (!player || isCompleted.value) return;

    const currentTime = player.getCurrentTime();
    watchedTime = currentTime;
    const duration = player.getDuration();
    const percent = (currentTime / duration) * 100;

    if (percent >= 70 && !isCompleted.value) {
      isCompleted.value = true;
      markLessonCompleted();
    }
  }, 1000);
};

const saveProgress = async (lessonId, timeWatched, userId) => {
  const payload = {
    lesson_id: parseInt(lessonId),
    user_id: parseInt(userId),
    time_watched: Math.floor(timeWatched),
    is_completed: isCompleted.value,
  };
  console.log("Gửi tiến độ:", payload);

  try {
    await axios.post("http://localhost:8080/api/lesson/lessonUser", payload);
    console.log("Gửi tiến độ thành công:", payload);
  } catch (error) {
    console.error("Gửi tiến độ thất bại:", error);
  }
};

const markLessonCompleted = () => {
  console.log("✅ Đã hoàn thành bài học:", lesson.value.title);
  saveProgress(lesson.value.id, watchedTime, userId);
};

const loadPlayer = async () => {
  isCompleted.value = false;
  watchedTime = 0;

  if (player && player.destroy) {
    player.destroy();
    player = null;
  }

  const playerContainer = document.getElementById("youtube-player");
  if (playerContainer) playerContainer.innerHTML = "";
  await loadYouTubeAPI();
  await nextTick();
  initPlayer();
};

onMounted(async () => {
  const now = Date.now();
  const TIME_LIMIT = 10 * 60 * 1000;
  const isStale = !lessonsStore.lastFetchedTime || now - lessonsStore.lastFetchedTime > TIME_LIMIT;

  if (!lessonsStore.lessons.length || isStale) {
    await lessonsStore.fetchLessons(courseId);
  }

  await loadPlayer();
});

watch(() => route.params.slug, async (newVal, oldVal) => {
  if (!isCompleted.value && watchedTime > 0 && oldVal) {
    await saveProgress(oldVal, watchedTime, userId);
  }
  await loadPlayer();
});

window.addEventListener("beforeunload", () => {
  if (!isCompleted.value && watchedTime > 0) {
    saveProgress(route.params.slug, watchedTime, userId);
  }
});
</script>



