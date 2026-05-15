<template>
  <div class="exercice-card" :class="`categorie-${exercice.categorie?.toLowerCase() || 'default'}`">
    <div class="card-icon">{{ getIcon(exercice.categorie) }}</div>
    <h3>{{ exercice.nom }}</h3>
    <p>{{ exercice.description?.slice(0, 80) }}...</p>
    <div class="card-footer">
      <span class="categorie-badge">{{ exercice.categorie || 'Général' }}</span>
      <RouterLink :to="`/exercices/${exercice.id}`" class="btn-detail">
        Voir
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </RouterLink>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  exercice: Object
})

const getIcon = (categorie) => {
  const icons = {
    'force': '💪',
    'cardio': '🔥',
    'musculation': '🏋️',
    'yoga': '🧘',
    'étirement': '🧎'
  }
  const catLower = categorie?.toLowerCase() || ''
  return icons[catLower] || '🎯'
}
</script>

<style scoped>
.exercice-card {
  background: white;
  border-radius: 20px;
  padding: 24px;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  border: 1px solid rgba(0,0,0,0.05);
}

.exercice-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 35px rgba(0,0,0,0.1);
}

.card-icon {
  font-size: 48px;
  margin-bottom: 16px;
}

.exercice-card h3 {
  font-size: 18px;
  font-weight: 600;
  color: #1e272e;
  margin-bottom: 8px;
}

.exercice-card p {
  color: #666;
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 16px;
}

.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.categorie-badge {
  font-size: 12px;
  padding: 4px 12px;
  border-radius: 20px;
  background: #e8f5e9;
  color: #2ecc71;
  font-weight: 500;
}

.btn-detail {
  background: none;
  border: none;
  color: #27ae60;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 4px;
  font-size: 13px;
  transition: gap 0.3s;
}

.btn-detail:hover {
  gap: 8px;
}

/* Couleurs par catégorie */
.categorie-force .categorie-badge { background: #e3f2fd; color: #2196f3; }
.categorie-cardio .categorie-badge { background: #ffebee; color: #f44336; }
</style>