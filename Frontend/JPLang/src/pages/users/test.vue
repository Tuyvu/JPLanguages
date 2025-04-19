<template>

  <div class="container">
    <main class="main-content">
      <section>
        <nav class="tabs" aria-label="Tabs">
          <button type="button">文字・語彙</button>
          <button type="button">文法・読解</button>
          <button type="button">聴解</button>
        </nav>

        <div class="instruction-box" role="region" aria-label="Instruction">
          もんだい（　　）に　なにを　いれますか。1・2・3・4から　いちばん　いい　ものを　ひとつ　えらんで　ください。
        </div>

        <!-- Render 50 câu -->
        <article v-for="(question, index) in questions" :key="index" class="question-card"
          :id="'question-' + (index + 1)">
          <div class="question-header">
            <p>Câu {{ index + 1 }}</p>
            <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
          </div>
          <p class="question-text">{{ question.text }}</p>

          <ul class="options-list" role="list">
            <li v-for="(option, optIndex) in question.options" :key="optIndex">
              {{ optIndex + 1 }}. {{ option }}
            </li>
          </ul>

          <div class="radio-group" role="radiogroup">
            <label v-for="optIndex in 4" :key="optIndex">
              {{ optIndex }}
              <input type="radio" :name="'q' + (index + 1)" :aria-checked="false" />
            </label>
          </div>
        </article>
      </section>

      <aside aria-label="Sidebar navigation and timer">
        <div class="timer">
          <i class="fas fa-stopwatch"></i>
          <span>1:28:40</span>
        </div>
        <button class="submit-btn" type="button">Nộp bài</button>

        <div class="scrollable" tabindex="0" aria-label="Question navigation">
          <div class="btn-group-wrap">
            <!-- Render 50 nút -->
            <button v-for="index in questions.length" :key="index" type="button" class="btn-circle"
              @click="scrollToQuestion(index)">
              {{ index }}
            </button>
          </div>
        </div>
      </aside>
    </main>
  </div>
</template>
  
  <script setup>
  import { ref } from 'vue'
  import axiosInstance from '../../plugins/axios'
  
  const questions = ref(
    Array.from({ length: 50 }, (_, i) => ({
      text: `Đây là nội dung câu hỏi số ${i + 1}`,
      options: ['Đáp án 1', 'Đáp án 2', 'Đáp án 3', 'Đáp án 4'],
    }))
  )
  
  const scrollToQuestion = (index) => {
    const el = document.getElementById('question-' + index)
    if (el) {
      el.scrollIntoView({ behavior: 'smooth', block: 'start' })
    }
  }
  </script>
  
  <style scoped>
  /* Copy style của bạn ở trên vào đây hoặc import cũng được */
  .main-content {
    display: flex;
  }
  section {
    width: 70%;
  }
  aside {
    width: 30%;
  }
  .btn-circle {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    background: #ccc;
    border: none;
    margin: 5px;
  }
  </style>
  