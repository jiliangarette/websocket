<template>
  <div class="nav-link cursor-pointer">
    <Bell class="notification-icon" />
    <span
      v-if="unreadNotifications > 0"
      class="notification-badge absolute rounded-full bg-red-600 text-white bottom-6 left-6 flex flex-col place-items-center justify-center w-5 text-center text-sm h-5">
      {{ unreadNotifications }}
    </span>
  </div>
</template>
<script setup>
  import axios from "axios";
  import { Bell } from "lucide-vue-next";
  import { ref, onMounted } from "vue";

  const unreadNotifications = ref(0);

  const getTotalNotification = async () => {
    try {
      const response = await axios.get(
        "http://127.0.0.1:8000/api/participants-summary-quiz"
      );

      unreadNotifications.value = response.data.length;
    } catch (error) {
      console.log(error);
    }
  };

  onMounted(() => {
    getTotalNotification();
  });
</script>
