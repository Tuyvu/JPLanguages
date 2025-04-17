<template>
    <!-- kanji -->
    <section id="kanji" class="mt-4">
        <div class="accordion" id="kanjiAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kanjiCollapse" aria-expanded="false" aria-controls="kanjiCollapse">
                        <i class="icn"><img src="https://www3.nhk.or.jp/nhkworld/lesson/assets/images/icn_kanji.png"
                                alt=""></i> Chữ Hán
                    </button>
                </h2>
                <div id="kanjiCollapse" class="accordion-collapse collapse" data-bs-parent="#kanjiAccordion">
                    <div class="accordion-body">
                            <div v-for="(item, index) in kanjis" :key="index" class="session-box">
                                <div class="text-box">
                                    <p><em lang="ja">{{ item.character }}</em></p>
                                    <p>{{ item.onyomi }}</p>
                                    <p>{{ item.meaning }}</p>
                                    <p>Ví dụ: {{ item.example }}</p>
                                </div>
                            </div>
                            <nav class="pagenation-s">
                                <ul class="d-flex justify-content-between">
                                    <li class="prev-btn"><a
                                            href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/01.html#kanji"
                                            class="btn btn-outline-primary"><i class="arrow"></i> #1</a></li>
                                    <li class="next-btn"><a
                                            href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/03.html#kanji"
                                            class="btn btn-outline-primary">#3 <i class="arrow"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- kanji -->
</template>
<script setup>
const props = defineProps({
    kanjis: {
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

        .pagenation-s ul {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
        }

  
</style>