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
  import { Bell } from "lucide-vue-next";
  import { ref } from "vue";

  const unreadNotifications = ref(12); //
</script>
