<template>
  <header class="navbar">
    <div class="logo">
      <h1>MySite</h1>
    </div>
    <nav>
      <NuxtLink to="/" class="nav-link">Home</NuxtLink>
      <NuxtLink to="/about" class="nav-link">About</NuxtLink>
      <NuxtLink to="/services" class="nav-link">Services</NuxtLink>
    </nav>
  </header>
</template>

<style scoped>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #282c34;
  padding: 1rem 2rem;
  color: white;
}

.logo h1 {
  margin: 0;
}

nav {
  display: flex;
  gap: 1rem;
}

.nav-link {
  color: #61dafb;
  text-decoration: none;
  font-size: 1rem;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  transition: background-color 0.3s, color 0.3s;
}

.nav-link:hover {
  background-color: #21a1f1;
  color: white;
}
</style>
