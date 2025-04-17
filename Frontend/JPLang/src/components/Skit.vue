<template>
  <div>
    <section id="skit">
      <div class="accordion" id="skitAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#skitCollapse" aria-expanded="false" aria-controls="tryitCollapse">
              <i class="icn"><img src="https://www3.nhk.or.jp/nhkworld/lesson/assets/images/icn_skit.png" alt=""></i>
              Hội thoại
            </button>
          </h2>
          <div id="skitCollapse" class="accordion-collapse collapse" data-bs-parent="#skitAccordion">
            <div class="bg-info bg-opacity-10 rounded p-4">

              <!-- One message -->
              <div v-for="(item, index) in conversations" :key="index" class="d-flex align-items-start mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/rrsUwAOsfJw4-eLyAevicIenHDV8cGdSk5rVDSW62-g.jpg"
                  width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Tâm">
                <div class="flex-grow-1">
                  <div class="bg-white rounded shadow-sm p-3 position-relative">
                    <p class="text-muted mb-1">{{ item.content }}</p>
                    <p class="text-muted mb-1">{{ item.pronunciation }}</p>
                    <p class="text-muted mb-0">{{ item.meaning }}</p>
                    <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
                  </div>
                  <p class="text-center text-secondary mt-2 mb-0">{{ item.speaker }}</p>
                </div>
              </div>

              <!-- Repeat this block for each dialogue -->
              <!-- Kaito message -->
              <!-- <div class="d-flex align-items-start mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/K592SA6lqSGVJwt9mwVWZGnfko5iM26utAMok_0eS60.jpg"
                  width="50" height="50" class="rounded-circle me-3 w-auto" alt="Avatar of Kaito">
                <div class="flex-grow-1">
                  <div class="bg-white rounded shadow-sm p-3 position-relative">
                    <p class="text-muted mb-1">はるさんハウスはどこですか。</p>
                    <p class="text-muted mb-1">Haru-san-Hausu wa doko desu ka.</p>
                    <p class="text-muted mb-0">Haru-san House ở đâu ạ?</p>
                    <i class="fas fa-volume-up text-warning position-absolute top-0 end-0 m-2"></i>
                  </div>
                  <p class="text-center text-secondary mt-2 mb-0">Kaito</p>
                </div>
              </div> -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- skit -->

  </div>
</template>
<script setup>
const props = defineProps({
  conversations: {
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
    
    
        .pagenation-s ul {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
        }
  
</style>