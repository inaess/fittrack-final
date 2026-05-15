<template>
  <div class="avis-page">
    <section class="page-header">
      <div class="container">
        <h1>⭐ Ce que nos utilisateurs disent</h1>
        <p>Plus de 500 utilisateurs satisfaits</p>
      </div>
    </section>

    <section class="stats-section">
      <div class="container">
        <div class="rating-card">
          <div class="rating-note">
            <span class="note">4.8</span>
            <span class="etoiles">⭐⭐⭐⭐⭐</span>
          </div>
          <p class="avis-count">Basé sur 127 avis</p>
        </div>
      </div>
    </section>

    <section class="avis-grid-section">
      <div class="container">
        <div class="avis-grid">
          <div class="avis-card" v-for="avis in avisList" :key="avis.id">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p class="commentaire">"{{ avis.commentaire }}"</p>
            <div class="user-info">
              <div class="avatar">{{ avis.nom[0] }}</div>
              <div class="user-details">
                <strong>{{ avis.nom }}</strong>
                <small>{{ avis.date }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-content">
          <h2>Rejoignez l'aventure FitTrack</h2>
          <p>Des milliers d'utilisateurs ont déjà fait le choix de FitTrack</p>
          <a href="http://127.0.0.1:8000/login" class="btn-primary">Commencer maintenant</a>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const avisList = ref([
  { id: 1, nom: 'Sophie M.', commentaire: 'FitTrack a complètement changé ma façon de m\'entraîner !', date: 'Avril 2026' },
  { id: 2, nom: 'Lucas D.', commentaire: 'Super app pour suivre mes séances, je recommande !', date: 'Mars 2026' },
  { id: 3, nom: 'Amina K.', commentaire: 'Très facile à utiliser, j\'adore les programmes personnalisés.', date: 'Mars 2026' },
  { id: 4, nom: 'Thomas R.', commentaire: 'Enfin une app fitness simple et efficace !', date: 'Février 2026' },
  { id: 5, nom: 'Julie L.', commentaire: 'Le suivi de progression m\'aide à rester motivée au quotidien.', date: 'Janvier 2026' },
  { id: 6, nom: 'Marc B.', commentaire: 'Les programmes sont bien structurés et adaptés à mon niveau.', date: 'Décembre 2025' },
])
</script>

<style scoped>
.avis-page {
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

.stats-section {
  padding: 40px 24px;
}

.rating-card {
  background: linear-gradient(135deg, #2ecc71, #27ae60);
  max-width: 300px;
  margin: 0 auto;
  padding: 32px;
  border-radius: 24px;
  text-align: center;
  color: white;
}

.note {
  font-size: 56px;
  font-weight: 700;
}

.etoiles {
  display: block;
  font-size: 24px;
  margin-top: 8px;
}

.avis-count {
  margin-top: 12px;
  opacity: 0.9;
}

.avis-grid-section {
  padding: 24px 24px 48px;
}

.avis-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
  max-width: 1280px;
  margin: 0 auto;
}

.avis-card {
  background: white;
  border-radius: 20px;
  padding: 28px;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.avis-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 35px rgba(0,0,0,0.1);
}

.stars {
  font-size: 18px;
  margin-bottom: 16px;
}

.commentaire {
  color: #444;
  font-style: italic;
  font-size: 15px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.user-info {
  display: flex;
  align-items: center;
  gap: 12px;
}

.avatar {
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, #2ecc71, #27ae60);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 20px;
  color: white;
}

.user-details {
  display: flex;
  flex-direction: column;
}

.user-details strong {
  color: #1e272e;
  font-size: 15px;
}

.user-details small {
  color: #999;
  font-size: 12px;
}

.cta-section {
  padding: 60px 24px 80px;
  background: #1e272e;
}

.cta-content {
  text-align: center;
  max-width: 600px;
  margin: 0 auto;
}

.cta-content h2 {
  font-size: 32px;
  color: white;
  margin-bottom: 16px;
}

.cta-content p {
  color: rgba(255,255,255,0.7);
  margin-bottom: 32px;
}

@media (max-width: 768px) {
  .page-header h1 { font-size: 32px; }
  .avis-grid { grid-template-columns: 1fr; }
  .cta-content h2 { font-size: 28px; }
}
</style>