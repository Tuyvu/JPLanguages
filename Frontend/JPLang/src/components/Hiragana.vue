<template>
  <div class="inside-block">
    <div class="module-letters">
      <p class="desc-txt">Bấm để xem chi tiết về mỗi chữ</p>
      <ul class="letters-block">
        <li class="module-letters-btn" :class="{ 'is-active': currentPage === 1 }" @click="changePage(1)">
          <span>Trang 1</span><i class="arrow"></i>
        </li>
        <li class="module-letters-btn" :class="{ 'is-active': currentPage === 2 }" @click="changePage(2)">
          <span>Trang 2</span><i class="arrow"></i>
        </li>
      </ul>
      <div class="module-letters-content">
        <div class="module-letters-block" style="display: block;">
          <ul class="letters-list">
            <template v-for="(item, index) in lettershiragana" :key="index">
              <li v-if="item.name !== '0'" @click="showModal" :data-id="item.number - 1">
                <img :src="'/src/assets/images/letters/hira/' + item.name + '.png'" :alt="item.name">
              </li>
              <li v-else></li>
            </template>
          </ul>
        </div>
        <div class="module-letters-block" style="display: block;">
             <ul class="letters-list">
                <template v-for="(item2, index1) in lettershiragana2" :key="index1">
                  <li class="module-modal" v-if="item2.number < 72" @click="showModal" :data-id="item2.number - 1">
                    <img :src="'/src/assets/images/letters/hira/' + item2.name + '.png'" :alt="item2.name">
                  </li>
                  <li v-else class="module-modal" style="width: 26%;" @click="showModal" :data-id="item2.number - 1">
                    <img :src="'/src/assets/images/letters/hira/' + item2.name + '.png'" :alt="item2.name">

                  </li>
                </template>
              </ul>
                 
            </div> 
      </div>
    </div>

    <div class="dl-block">
      <ul>
        <li>
          <a href="#">
            <div><i class="icn-pdf"></i>PDF</div><span>Tải về bảng chữ Hiragana</span>
          </a>
        </li>
        <li>
          <a href="#">
            <div><i class="icn-pdf"></i>PDF</div><span>Tải về bảng chữ Katakana</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Modal Swiper -->
  <div id="module-modal">
      <section v-if="selectedLetter" id="slider-block">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <!-- Chỉ hiển thị chữ cái được chọn -->
            <div class="swiper-slide">
              <div class="audio-box" @click="speak" :data-audio="selectedLetter.number - 1"><i class="icn-play"></i></div>
              <figure>
                <img :src="`/src/assets/images/letters/detail/hira/${selectedLetter.name}.png`" :alt="selectedLetter.name">
              </figure>
            </div>
          </div>
          <div class="swiper-button-next" @click="showModalnext"></div>
          <div class="swiper-button-prev" @click="showModalprev"></div>
        </div>
      </section>
      <p class="close-btn" @click="closeModal"></p>
    </div>
  <div id="module-overlay" style="display: none;"></div>
</template>

<script setup>
import { ref, onMounted, nextTick } from "vue";
import "swiper/swiper-bundle.css";
import { lettershiragana, lettershiragana2 } from "../constants/index";

const currentPage = ref(1);
const moduleOverlay = ref(null);
const moduleModalContent = ref(null);
const selectedLetter = ref(null);
let modalId = ref(null);

function changePage(page) {
  currentPage.value = page;
}

onMounted(async () => {
  await nextTick();
  moduleOverlay.value = document.getElementById("module-overlay");
  moduleModalContent.value = document.getElementById("module-modal");
});
function speak() {
      const utterance = new SpeechSynthesisUtterance(selectedLetter.value.character);
      utterance.lang = 'ja-JP';
      utterance.rate = 0.5;
      window.speechSynthesis.speak(utterance);
}
function findletter(modalId) {
  selectedLetter.value = lettershiragana.find((item) => item.number === modalId + 1); 
  if(selectedLetter.value==null) {
      selectedLetter.value = lettershiragana2.find((item) => item.number === modalId + 1);
    }
if (moduleOverlay.value && moduleModalContent.value) {
  moduleOverlay.value.style.display = "block";
  moduleModalContent.value.style.display = "block";
  moduleOverlay.value.classList.add("is-active");
  moduleModalContent.value.classList.add("is-active");
} else {
  console.error("One or both elements are null or undefined");
}
}
function showModal(event) {
  console.log("Show modal triggered");
  modalId = parseInt(event.currentTarget.dataset.id, 10);
  findletter(modalId);
}
function showModalnext() {
  if(modalId!==45){
  modalId = modalId +1;
    findletter(modalId);
  }
}
function showModalprev() {
  if(modalId!==0){
  modalId = modalId -1;
    findletter(modalId);
  }
}

function closeModal(event) {
  event.preventDefault();
  if (moduleOverlay.value && moduleModalContent.value) {
    moduleOverlay.value.style.display = "none";
    moduleModalContent.value.style.display = "none";
    moduleOverlay.value.classList.remove("is-active");
    moduleModalContent.value.classList.remove("is-active");
  }

  selectedLetter.value = null;
}
</script>
