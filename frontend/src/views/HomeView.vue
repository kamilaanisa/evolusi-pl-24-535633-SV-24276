<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <div class="home-container">
    <div class="hero-card">
      <span class="hero-badge">🚀 Platform Manajemen Tugas</span>
      <h1>Kelola Tugas Kuliah Jadi Lebih Terstruktur</h1>
      <p class="hero-description">
        Integrasi seamless antara Laravel REST API backend dan Vue 3 reactive frontend.
      </p>
      
      <div class="action-buttons">
        <RouterLink
          to="/about"
          class="btn-primary"
        >
          Lihat Daftar Tugas
          <span class="arrow">→</span>
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<style scoped>
.home-container {
  max-width: 1000px;
  margin: 60px auto;
  padding: 0 24px;
  display: flex;
  justify-content: center;
}

.hero-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 20px;
  padding: 48px;
  text-align: center;
  max-width: 680px;
  box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
}

.hero-badge {
  display: inline-block;
  background: #eff6ff;
  color: #2563eb;
  font-size: 0.85rem;
  font-weight: 600;
  padding: 6px 16px;
  border-radius: 20px;
  margin-bottom: 20px;
}

.hero-card h1 {
  font-size: 2.2rem;
  font-weight: 800;
  line-height: 1.3;
  color: #0f172a;
  margin-bottom: 16px;
  letter-spacing: -0.02em;
}

.hero-description {
  color: #64748b;
  font-size: 1.05rem;
  line-height: 1.6;
  margin-bottom: 32px;
}

.action-buttons {
  display: flex;
  justify-content: center;
}

.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background-color: #2563eb;
  color: #ffffff;
  text-decoration: none;
  font-weight: 600;
  font-size: 1rem;
  padding: 12px 28px;
  border-radius: 10px;
  transition: all 0.2s ease;
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
}

.btn-primary:hover {
  background-color: #1d4ed8;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
}

.arrow {
  transition: transform 0.2s ease;
}

.btn-primary:hover .arrow {
  transform: translateX(4px);
}
</style>