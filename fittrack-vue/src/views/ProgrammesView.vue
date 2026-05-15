<template>
  <div class="programmes-page">
    <section class="page-header">
      <div class="container">
        <h1>📋 Programmes d'entraînement</h1>
        <p>Des programmes adaptés à tous les niveaux</p>
      </div>
    </section>

    <section class="programmes-grid-section">
      <div class="container">
        <div v-if="loading" class="empty-state">
          <p>Chargement...</p>
        </div>
        <div v-else-if="programmes.length === 0" class="empty-state">
          <span class="empty-icon">📭</span>
          <h3>Aucun programme trouvé</h3>
        </div>
        <div v-else class="programmes-grid">
          <ProgrammeCard 
            v-for="programme in programmes" 
            :key="programme.id" 
            :programme="programme" 
          />
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import ProgrammeCard from '../components/ProgrammeCard.vue'

const programmes = ref([])
const loading = ref(false)

onMounted(async () => {
  loading.value = true
  try {
    const response = await fetch('http://127.0.0.1:8000/api/programmes')
    programmes.value = await response.json()
  } finally {
    loading.value = false
  }
})
</script>

<style scoped>
.programmes-page {
  background: #f0f2f5;
  min-height: calc(100vh - 70px);
}

.page-header {
  background: linear-gradient(135deg, #1e272e, #2c3e50);
  padding: 60px 24px;
  text-align: center;
  color: white;
}

.page-header h1 {
  font-size: 42px;
  margin-bottom: 16px;
}

.page-header p {
  font-size: 18px;
  opacity: 0.8;
}

.programmes-grid-section {
  padding: 48px 24px;
}

.programmes-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
  max-width: 1280px;
  margin: 0 auto;
}

.empty-state {
  text-align: center;
  padding: 80px 20px;
}

.empty-icon {
  font-size: 64px;
  display: block;
  margin-bottom: 20px;
}

.empty-state h3 {
  font-size: 24px;
  color: #1e272e;
  margin-bottom: 8px;
}

@media (max-width: 768px) {
  .page-header h1 { font-size: 32px; }
  .programmes-grid { grid-template-columns: 1fr; }
}
</style>