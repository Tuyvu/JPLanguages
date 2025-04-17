<template>
    <!-- key -->
    <section id="key" class="mt-4">
      <div class="accordion" id="keyAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#keyCollapse" aria-expanded="false" aria-controls="tryitCollapse">
              <i class="icn"><img src="https://www3.nhk.or.jp/nhkworld/lesson/assets/images/icn_key.png" alt=""></i> Mẫu câu cơ bản
            </button>
          </h2>
          <div id="keyCollapse" class="accordion-collapse collapse" data-bs-parent="#keyAccordion">
            <div class="accordion-body">
             <div v-for="(item, index) in keys" :key="index">
                <p class="session-text">{{ item.title }}</p>
              <div class="session-box">
                <a href="#" class="text-box audio-box" data-audio="ls-02_kp-01">
                  <p><em lang="ja">{{ item.pattern }}</em></p>
                  <p>{{ item.usage }}</p>
                  <p>{{ item.example }}</p>
                  <i class="icn-play"></i>
                </a>
              </div>
             </div>
              <nav class="pagenation-s">
                <ul class="d-flex justify-content-between">
                  <li class="prev-btn"><a href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/01.html#key" class="btn btn-outline-primary"><i class="arrow"></i> #1</a></li>
                  <li class="next-btn"><a href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/03.html#key" class="btn btn-outline-primary">#3 <i class="arrow"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
        <!-- key -->
</template>
<script setup>
const props = defineProps({
    keys: {
    type: Array,
    default: () => [],
  },
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
    
        .icn-play::before {
            content: '▶';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
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
        .more-block ul {
            list-style: none;
            padding: 0;
        }
    
        .more-block li {
            margin-bottom: 10px;
        }
    
        .more-block .arrow::before {
            content: '→';
            margin-left: 5px;
        }
  
</style>