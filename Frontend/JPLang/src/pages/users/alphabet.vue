<template>
    <div class="bg">
    <div class="container">
      <div class="inner-block mx-5">
        <!-- Circle Title -->
        <h1 class="circle-title d-flex align-items-baseline text-dark">
          <i class="circle-icon bg-warning me-3"></i>
          <span>Chữ cái tiếng Nhật</span>
        </h1>
        <!-- Description Text -->
        <div class="desc-txt">
          <p>
            Tiếng Nhật có 3 loại chữ là: Hiragana, Katakana và Kanji tức chữ Hán.<br>
            Hiragana và Katakana là chữ biểu âm, mỗi chữ thể hiện 1 âm, còn chữ Hán là chữ biểu ý, mỗi chữ có ý nghĩa nhất định.
          </p>
          <p>Để học thêm tiếng Nhật, bấm vào đây.</p>
        </div>
      </div>
      <div class="line-block">
      <div class="line">
        <!-- Navigation Tabs -->
        <ul class="switch-block">
          <li 
            v-for="(tab, index) in tabs" 
            :key="index" 
            :class="{ 'is-active': activeTab === tab.name }"
          >
            <a @click.prevent="selectTab(tab.name)">{{ tab.label }}</a>
          </li>
        </ul>
      </div>
  
      <!-- Dynamic Component -->
      <div class="content-block">
        <component :is="activeComponent"></component>
      </div>
    </div>
    </div>
    </div>
   
  </template>
  
  <script setup>
  import HiraganaComponent from '../../components/Hiragana.vue';
  import KatakanaComponent from '../../components/Katakana.vue';
  import KanjiComponent from '../../components/Han.vue';

  import { ref, computed, markRaw } from 'vue';

  const activeTab = ref('hiragana'); // Tab mặc định

  const tabs = ref([
    { name: 'hiragana', label: 'Hiragana', component: markRaw(HiraganaComponent) },
    { name: 'katakana', label: 'Katakana', component: markRaw(KatakanaComponent) },
    { name: 'kanji', label: 'Chữ Hán', component: markRaw(KanjiComponent) },
  ]);

  const activeComponent = computed(() => {
    const activeTabObj = tabs.value.find(tab => tab.name === activeTab.value);
    return activeTabObj ? activeTabObj.component : null;
  });

  const selectTab = (tabName) => {
    activeTab.value = tabName;
  };
</script>


  <style scoped>
  .switch-block{
    background: #61c69f;
  }
  .switch-block,
  #app .line-block .switch-block li {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border-radius: 8px 8px 0 0
  }

  #app .line-block .switch-block {
    max-width: 980px;
    margin: 0 auto;
    padding: 16px 16px 0;
    -webkit-box-align: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between
  }

  #app .line-block .switch-block li {
    line-height: 1.2;
    position: relative;
    z-index: 4;
    color: #fff;
    border: 1px solid #95d7be;
    border-bottom: 1px solid #338b6a;
    background: #95d7be;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 32.5%
  }

  #app .line-block .switch-block li span {
    padding: 24px 0
  }

  #app .line-block .switch-block li a {
    display: block;
    width: 100%;
    padding: 24px 0;
    text-align: center
  }

  #app .line-block .switch-block li.is-active {
    color: #5fc7a0;
    border: 1px solid #338b6a;
    border-bottom: 1px solid #fff;
    background: #fff
  }

  .switch-block {
    border-radius: 0
  }

  .switch-block li a,
  #app .line-block .switch-block li span {
    padding: 16px 0
  }
</style>
  <style scoped>
  .bg{
    background: var(--bg-green-light);
  }
  .circle-title {
    font-size: 1.5rem;
    font-weight: 700;
    padding: 20px 0;
  }
  
  .circle-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    position: relative;
  }
  
  .circle-icon:before {
    content: '';
    position: absolute;
    right: -4px;
    bottom: -4px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #fbb378;
  }
  </style>