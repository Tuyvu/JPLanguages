<template>
  <div class="search-container">
    <h2>Tìm kiếm từ vựng tiếng Nhật</h2>
    <div class="input-group">
      <input
      class="inputJP"
        v-model="query"
        placeholder="Nhập từ vựng..."
        @keyup.enter="searchWord"
      />
      <button @click="searchWord">Tìm kiếm</button>
    </div>

    <h3 v-if="hiragana">Ý bạn là: {{ hiragana }}</h3>

    <div v-if="wordData">
      <h3>Kết quả:</h3>
      <ul>
        <li v-for="(item, index) in wordData.data" :key="index">
          <strong>{{ item.japanese[0].word || item.japanese[0].reading }}</strong> -
          {{ item.senses[0].english_definitions.join(", ") }}
        </li>
      </ul>
    </div>

    <div v-if="exampleSentences">
      <h3>Câu ví dụ:</h3>
      <ul>
        <li v-for="(sentence, index) in exampleSentences.results" :key="index">
          {{ sentence.text }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { toHiragana } from "wanakana";

const hiragana= ref("");;
const query = ref("");
const wordData = ref(null);
const exampleSentences = ref(null);

const searchWord = async () => {
  hiragana.value = toHiragana(query.value);
  if (!query.value) return;
 
  try {
    const wordResponse = await axios.get(`http://localhost:8080/api/search-word?word=${query.value}`);
    wordData.value = wordResponse.data;

    const exampleResponse = await axios.get(`http://localhost:8080/api/example-sentence?word=${query.value}`);
    exampleSentences.value = exampleResponse.data;
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};
</script>

<style scoped>
.search-container {

  padding: 20px;
  border-radius: 8px;
  max-width: 600px;
  margin: 0 auto;
}

.input-group {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.inputJP {
  flex: 1;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 20px !important;
}

button {
  padding: 10px 15px;
  background-color: var(--success-color);
  color: white;
  border: none;
  border-radius: 20px !important;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}
</style>
