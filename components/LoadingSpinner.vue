<template>
  <div
    class="w-12 h-12 border-4 border-t-4 border-gray-300 rounded-full spinner"></div>
</template>

<style scoped>
  .spinner {
    animation: spin 1s linear infinite;
    border-top-color: transparent;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
</style>
