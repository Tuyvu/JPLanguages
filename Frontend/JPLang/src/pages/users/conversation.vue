<template>
<body class="bg-light">

  <div class="container py-4">
    <div class="bg-white rounded shadow p-4">

      <!-- Header -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-clapperboard fs-4 text-teal"></i>
          <h1 class="ms-2 h5 text-teal fw-semibold">Hội thoại</h1>
        </div>
        <button class="btn btn-outline-teal btn-sm">#2 &gt;</button>
      </div>

      <!-- Dialogue Box -->
      <div class="bg-info bg-opacity-10 rounded p-4">

        <!-- One message -->
        <div class="d-flex align-items-start mb-4">
          <img src="https://storage.googleapis.com/a1aa/image/rrsUwAOsfJw4-eLyAevicIenHDV8cGdSk5rVDSW62-g.jpg" width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Tâm">
          <div class="flex-grow-1">
            <div class="bg-white rounded shadow-sm p-3 position-relative">
              <p class="text-muted mb-1">すみません。</p>
              <p class="text-muted mb-1">Sumimasen.</p>
              <p class="text-muted mb-0">Xin lỗi cho tôi hỏi.</p>
              <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
            </div>
            <p class="text-center text-secondary mt-2 mb-0">Tâm</p>
          </div>
        </div>

        <!-- Repeat this block for each dialogue -->
        <!-- Kaito message -->
        <div class="d-flex align-items-start mb-4">
          <img src="https://storage.googleapis.com/a1aa/image/K592SA6lqSGVJwt9mwVWZGnfko5iM26utAMok_0eS60.jpg" width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Kaito">
          <div class="flex-grow-1">
            <div class="bg-white rounded shadow-sm p-3 position-relative">
              <p class="text-muted mb-1">はるさんハウスはどこですか。</p>
              <p class="text-muted mb-1">Haru-san-Hausu wa doko desu ka.</p>
              <p class="text-muted mb-0">Haru-san House ở đâu ạ?</p>
              <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
            </div>
            <p class="text-center text-secondary mt-2 mb-0">Kaito</p>
          </div>
        </div>

        <!-- Các đoạn hội thoại tiếp theo của Kaito -->
        <div class="d-flex align-items-start mb-4">
          <img src="https://storage.googleapis.com/a1aa/image/K592SA6lqSGVJwt9mwVWZGnfko5iM26utAMok_0eS60.jpg" width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Kaito">
          <div class="flex-grow-1">
            <div class="bg-white rounded shadow-sm p-3 position-relative">
              <p class="text-muted mb-1">はるさんハウス？</p>
              <p class="text-muted mb-1">Haru-san-Hausu?</p>
              <p class="text-muted mb-0">Haru-san House ạ?</p>
              <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
            </div>
            <p class="text-center text-secondary mt-2 mb-0">Kaito</p>
          </div>
        </div>

        <div class="d-flex align-items-start mb-4">
          <img src="https://storage.googleapis.com/a1aa/image/K592SA6lqSGVJwt9mwVWZGnfko5iM26utAMok_0eS60.jpg" width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Kaito">
          <div class="flex-grow-1">
            <div class="bg-white rounded shadow-sm p-3 position-relative">
              <p class="text-muted mb-1">あれ？ぼくたちのうちだよね。</p>
              <p class="text-muted mb-1">Are? Bokutachi no uchi da yo ne.</p>
              <p class="text-muted mb-0">Ơ? Đấy là nhà bọn mình nhỉ.</p>
              <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
            </div>
            <p class="text-center text-secondary mt-2 mb-0">Kaito</p>
          </div>
        </div>

        <div class="d-flex align-items-start mb-4">
          <img src="https://storage.googleapis.com/a1aa/image/K592SA6lqSGVJwt9mwVWZGnfko5iM26utAMok_0eS60.jpg" width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Kaito">
          <div class="flex-grow-1">
            <div class="bg-white rounded shadow-sm p-3 position-relative">
              <p class="text-muted mb-1">すぐ近くです。</p>
              <p class="text-muted mb-1">Sugu chikaku desu.</p>
              <p class="text-muted mb-0">Ngay gần thôi.</p>
              <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
            </div>
            <p class="text-center text-secondary mt-2 mb-0">Kaito</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</template>
<script setup>
import axiosInstance from '../../plugins/axios';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
// onMounted (() => {
//     const conversation = ref([]);
//     const getConversation = async () => {
//         try {
//             const response = await axiosInstance.get(`/conversation/${userId}`);
//             conversation.value = response.data;
//         } catch (error) {
//             console.error(error);
//         }
//     };
//     getConversation();
// });
</script>
<style scoped>
    .text-teal {
      color: #20c997;
    }
    .btn-outline-teal {
      color: #20c997;
      border-color: #20c997;
    }
    .btn-outline-teal:hover {
      background-color: #20c997;
      color: #fff;
    }
  </style>