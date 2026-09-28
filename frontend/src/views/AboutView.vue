<script setup>
import { ref, onMounted } from 'vue'

const tugas = ref([])
const loading = ref(true)
const error = ref(null)

const formatTanggal = (dateString) => {
  if (!dateString) return ''
  const date = new Date(dateString)
  return new Intl.DateTimeFormat('id-ID', {
    day: 'numeric',
    month: 'short',
    year: 'numeric'
  }).format(date)
}

onMounted(async () => {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/tugas`, {
      headers: {
        'Accept': 'application/json'
      }
    })
    
    if (!response.ok) {
      throw new Error('Gagal menghubungi server Laravel')
    }
    tugas.value = await response.json()
  } catch (err) {
    error.value = err.message
  } finally {
    loading.value = false
  }
})
</script>

<template>
  <div class="container">
    <div class="header">
      <h1>Daftar Tugas Kuliah</h1>
      <p class="subtitle">Daftar tugas terintegrasi langsung dari API Laravel</p>
    </div>

    <!-- Status Loading -->
    <div v-if="loading" class="state-card">
      <p>⏳ Memuat data tugas...</p>
    </div>

    <!-- Status Error -->
    <div v-else-if="error" class="state-card error">
      <p>⚠️ {{ error }}</p>
    </div>

    <!-- Data Kosong -->
    <div v-else-if="tugas.length === 0" class="state-card empty">
      <p>🎉 Belum ada tugas, santai dulu!</p>
    </div>

    <!-- List Tugas Card -->
    <div v-else class="tugas-grid">
      <div v-for="item in tugas" :key="item.id" class="tugas-card">
        <div class="card-header">
          <h3>{{ item.judul }}</h3>
          <span :class="['badge', item.prioritas]">{{ item.prioritas }}</span>
        </div>
        <div class="card-footer">
          <span class="deadline">📅 {{ formatTanggal(item.deadline) }}</span>
          <span :class="['status', item.selesai ? 'selesai' : 'pending']">
            {{ item.selesai ? '✓ Selesai' : '⏳ Belum Selesai' }}
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 800px;
  margin: 40px auto;
  padding: 0 24px;
}

.header {
  margin-bottom: 28px;
}

.header h1 {
  font-size: 1.8rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 6px;
}

.subtitle {
  color: #64748b;
  font-size: 0.95rem;
}

.state-card {
  background: #ffffff;
  border: 1px dashed #cbd5e1;
  padding: 40px;
  text-align: center;
  border-radius: 12px;
  color: #64748b;
}

.state-card.error {
  background: #fef2f2;
  border-color: #fecaca;
  color: #dc2626;
}

.tugas-grid {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.tugas-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  transition: all 0.2s ease;
}

.tugas-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  transform: translateY(-2px);
}

.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
}

.card-header h3 {
  margin: 0;
  font-size: 1.1rem;
  font-weight: 600;
  color: #1e293b;
}

.badge {
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: capitalize;
}

.badge.tinggi {
  background: #fef2f2;
  color: #ef4444;
}

.badge.sedang {
  background: #fffbe3;
  color: #d97706;
}

.badge.rendah {
  background: #f0fdf4;
  color: #16a34a;
}

.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.85rem;
  color: #64748b;
  padding-top: 12px;
  border-top: 1px solid #f1f5f9;
}

.status.selesai {
  color: #16a34a;
  font-weight: 600;
}

.status.pending {
  color: #d97706;
  font-weight: 600;
}
</style>