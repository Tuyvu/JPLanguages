<template>
    <div class="container">
        <h2 class="accordion-header my-4">
            <button class="accordion-button collapsed" type="button" aria-expanded="false" aria-controls="vocabularyCollapse">
              <i class="icn"><img src="https://www3.nhk.or.jp/nhkworld/lesson/assets/images/icn_vocabulary.png" alt=""></i> Từ vựng
            </button>
          </h2>
        <div id="vocabularyCollapse" class="accordion-collapse collapse  show" data-bs-parent="#vocabularyAccordion">
            <div class="accordion-body">
                <div v-if="vocabulary.length > 0">
                    <div v-for="(item, index) in vocabulary" :key="index" class="session-box">
                        <div class="text-box">
                            <p><em lang="ja">{{ item.word }}</em></p>
                            <p>{{ item.pronunciation }}</p>
                            <p>{{ item.meaning }}</p>
                            <p>Ví dụ: {{ item.example_sentence }}</p>
                        </div>
                    </div>
                </div>
                <nav class="pagenation-s">
                    <ul class="d-flex justify-content-between">
                        <li class="prev-btn"><a
                                href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/01.html#vocabulary"
                                class="btn btn-outline-primary"><i class="arrow"></i> #1</a></li>
                        <li class="next-btn"><a
                                href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/03.html#vocabulary"
                                class="btn btn-outline-primary">#3 <i class="arrow"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


</template>
<script setup>
import { ref, onMounted } from 'vue';
import axiosInstance from '../../plugins/axios';

const vocabulary = ref([]);

onMounted(async () => {
    try {
        const response = await axiosInstance.get('/GetVocabularies');
        vocabulary.value = response.data; 
    } catch (error) {
        console.error(error);
    }
    console.log(vocabulary.value);
});
</script>

<style scoped>
        .accordion-button i.icn img {
            width: 24px;
            height: 24px;
            margin-right: 8px;
        }
    
        .session-box {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
    
        .session-box figure {
            margin-right: 15px;
        }
    
        .session-box figure img {
            width: 50px;
            height: 50px;
        }
    
        .text-box {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            position: relative;
        }
    
    
        .module-modal {
            margin-left: 10px;
        }
    
        .module-modal p {
            display: flex;
            align-items: center;
        }
    
        .module-modal img {
            width: 24px;
            height: 24px;
            margin-left: 5px;
        }
    
        .pagenation-s ul {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
        }
  
</style>