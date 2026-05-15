<template>
  <div class="exercice-page">
    <div v-if="exercice">
      <!-- Header -->
      <section class="page-header">
        <div class="container">
          <span class="categorie-tag">{{ exercice.categorie }}</span>
          <h1>{{ exercice.nom }}</h1>
          <div class="meta">
            <span class="difficulte" :class="difficulteClass">
              {{ exercice.difficulte || 'Intermédiaire' }}
            </span>
          </div>
        </div>
      </section>

      <!-- Contenu -->
      <section class="exercice-content">
        <div class="container">
          <div class="content-card">
            <div class="exercice-icon">{{ getIcon(exercice.categorie) }}</div>
            <h2>Description</h2>
            <p>{{ exercice.description || 'Exercice complet pour travailler les muscles.' }}</p>

            <h2>Instructions</h2>
            <ul class="instructions">
              <li v-for="(step, index) in instructions" :key="index">{{ step }}</li>
            </ul>

            <h2>Conseils</h2>
            <div class="tips">
              <p>💡 {{ exercice.conseil || 'Respectez toujours votre rythme et votre respiration.' }}</p>
            </div>
          </div>
          <RouterLink to="/exercices" class="btn-retour">← Retour aux exercices</RouterLink>
        </div>
      </section>
    </div>

    <div v-else class="not-found">
      <h2>Exercice introuvable</h2>
      <RouterLink to="/exercices">← Retour aux exercices</RouterLink>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import { useExerciceStore } from '../stores/exercice'

const route = useRoute()
const store = useExerciceStore()

const exercice = computed(() => {
  return store.exercices.find(e => e.id === parseInt(route.params.id))
})

const getIcon = (categorie) => {
  const icons = {
    'Force': '💪',
    'Cardio': '🔥',
    'Musculation': '🏋️',
    'Yoga': '🧘',
    'Étirement': '🧎'
  }
  return icons[categorie] || '🎯'
}

const difficulteClass = computed(() => {
  const niveau = exercice.value?.difficulte?.toLowerCase() || 'intermediaire'
  return {
    'debutant': niveau === 'debutant',
    'intermediaire': niveau === 'intermediaire',
    'avance': niveau === 'avance'
  }
})

const instructions = computed(() => {
  return exercice.value?.instructions || [
    'Positionnez-vous correctement',
    'Effectuez le mouvement avec contrôle',
    'Respectez le nombre de répétitions',
    'Reposez-vous entre les séries'
  ]
})
</script>

<style scoped>
.exercice-page {
  background: #f0f2f5;
  min-height: calc(100vh - 70px);
}

.page-header {
  background: linear-gradient(135deg, #1e272e, #2c3e50);
  padding: 60px 24px;
  text-align: center;
  color: white;
}

.categorie-tag {
  display: inline-block;
  background: #2ecc71;
  color: white;
  padding: 6px 16px;
  border-radius: 30px;
  font-size: 13px;
  font-weight: 600;
  margin-bottom: 20px;
}

.page-header h1 {
  font-size: 42px;
  margin-bottom: 16px;
}

.meta {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 16px;
}

.difficulte {
  display: inline-block;
  padding: 5px 15px;
  border-radius: 30px;
  font-size: 13px;
  font-weight: 600;
}

.difficulte.debutant {
  background: #2ecc71;
  color: white;
}

.difficulte.intermediaire {
  background: #f39c12;
  color: white;
}

.difficulte.avance {
  background: #e74c3c;
  color: white;
}

.exercice-content {
  padding: 48px 24px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}

.content-card {
  background: white;
  border-radius: 24px;
  padding: 48px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  margin-bottom: 24px;
}

.exercice-icon {
  font-size: 72px;
  text-align: center;
  margin-bottom: 24px;
}

.content-card h2 {
  font-size: 24px;
  color: #1e272e;
  margin: 32px 0 16px 0;
  padding-bottom: 8px;
  border-bottom: 3px solid #2ecc71;
  display: inline-block;
}

.content-card p {
  line-height: 1.8;
  color: #444;
  font-size: 16px;
  margin-bottom: 24px;
}

.instructions {
  background: #f8f9fa;
  border-radius: 16px;
  padding: 24px 32px;
  margin-bottom: 24px;
}

.instructions li {
  margin: 12px 0;
  line-height: 1.6;
  color: #555;
}

.tips {
  background: #e8f5e9;
  border-radius: 16px;
  padding: 20px 24px;
  border-left: 4px solid #2ecc71;
}

.tips p {
  margin: 0;
  color: #2c3e50;
  font-style: italic;
}

.btn-retour {
  display: inline-block;
  color: #27ae60;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s;
}

.btn-retour:hover {
  transform: translateX(-5px);
}

.not-found {
  text-align: center;
  padding: 80px;
  background: #f0f2f5;
  min-height: calc(100vh - 70px);
}

.not-found h2 {
  font-size: 32px;
  color: #1e272e;
  margin-bottom: 20px;
}

@media (max-width: 768px) {
  .page-header h1 { font-size: 32px; }
  .content-card { padding: 28px; }
  .content-card h2 { font-size: 20px; }
}
</style>