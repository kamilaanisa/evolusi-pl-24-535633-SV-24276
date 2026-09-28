<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div class="app-layout">
    <header class="navbar">
      <div class="nav-container">
        <div class="logo">
          <span class="logo-icon">📝</span>
          <span class="logo-text">TaskMaster</span>
        </div>
        <nav class="nav-links">
          <RouterLink
            to="/"
            class="nav-item"
          >
            Beranda
          </RouterLink>
          <RouterLink
            to="/about"
            class="nav-item"
          >
            Daftar Tugas
          </RouterLink>
        </nav>
      </div>
    </header>

    <main class="main-content">
      <RouterView />
    </main>
  </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Plus Jakarta Sans', sans-serif;
  background-color: #f8fafc;
  color: #0f172a;
}

.app-layout {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.navbar {
  background: #ffffff;
  border-bottom: 1px solid #e2e8f0;
  position: sticky;
  top: 0;
  z-index: 100;
}

.nav-container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 24px;
  height: 64px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
  font-size: 1.15rem;
  color: #0f172a;
}

.logo-icon {
  font-size: 1.3rem;
}

.nav-links {
  display: flex;
  gap: 8px;
}

.nav-item {
  text-decoration: none;
  color: #64748b;
  font-weight: 500;
  font-size: 0.95rem;
  padding: 8px 16px;
  border-radius: 8px;
  transition: all 0.2s ease;
}

.nav-item:hover {
  color: #2563eb;
  background-color: #eff6ff;
}

.nav-item.router-link-active {
  color: #2563eb;
  background-color: #eff6ff;
  font-weight: 600;
}

.main-content {
  flex: 1;
}
</style>