<template>
  <header class="navbar">
    <div class="logo">
      <NuxtLink to="/" class="logo-link">
        <h1>My Playground</h1>
      </NuxtLink>
    </div>
    <nav class="nav-links">
      <NuxtLink
        to="/"
        class="nav-link border hover:opacity-75 transition-all ease-in-out duration-300"
        >Home</NuxtLink
      >
      <NuxtLink
        to="/about"
        class="nav-link border hover:opacity-75 transition-all ease-in-out duration-300"
        >About</NuxtLink
      >
      <div
        class="relative flex flex-col hover:bg-gray-200 rounded-xl transition-all ease-in-out duration-300 w-12 h-12 place-items-center justify-center">
        <div class="nav-link">
          <Bell class="notification-icon" />
          <span
            v-if="unreadNotifications > 0"
            class="notification-badge absolute bg-red-600 text-white bottom-6 left-6 flex flex-col place-items-center justify-center w-5 text-center h-5">
            {{ unreadNotifications }}
          </span>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
  import { Bell } from "lucide-vue-next";
  import { ref } from "vue";

  const unreadNotifications = ref(3); //
</script>

<style scoped>
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: transparent;
    padding: 1rem 2rem;
    position: relative;
    z-index: 10;
    width: 100%;
  }

  .logo-link h1 {
    font-size: 1.5rem;
    font-weight: bold;
    transition: color 0.3s ease;
  }

  .logo-link:hover h1 {
    color: #61dafb;
  }

  .nav-links {
    display: flex;
    gap: 1.5rem;
    align-items: center;
  }

  .nav-link {
    text-decoration: none;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
  }

  .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  .notification-icon {
    width: 24px;
    height: 24px;
  }

  .notification-badge {
    position: absolute;
    border-radius: 50%;
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
  }
</style>
