<template>

</template>
<script setup>
import axiosInstance from '../../plugins/axios';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
onMounted (() => {
    const conversation = ref([]);
    const getConversation = async () => {
        try {
            const response = await axiosInstance.get(`/conversation/${userId}`);
            conversation.value = response.data;
        } catch (error) {
            console.error(error);
        }
    };
    getConversation();
});
</script>