<template>
  <NavbarLayout>
    <NuxtPage />
  </NavbarLayout>
</template>

<script setup>
  import NavbarLayout from "~/layout/NavbarLayout.vue";

  const dynamicTitle = ref("Jilian Garette Abangan");

  useHead({
    title: dynamicTitle.value,
    meta: [{ name: "description", content: "My amazing site." }],
    bodyAttrs: {
      class: "app-content",
    },
    script: [{ innerHTML: "console.log('Hello world')" }],
  });

  useSeoMeta({
    title: "My Amazing Site",
    ogTitle: "My Amazing Site",
    description: "This is my amazing site, let me tell you all about it.",
    ogDescription: "This is my amazing site, let me tell you all about it.",
    ogImage: "https://example.com/image.png",
    twitterCard: "summary_large_image",
  });
</script>
<style>
  .app-content {
    font-family: Helvetica;
  }

  .page-enter-active,
  .page-leave-active {
    transition: all 0.4s;
  }
  .page-enter-from,
  .page-leave-to {
    opacity: 0;
    filter: blur(1rem);
  }
</style>
