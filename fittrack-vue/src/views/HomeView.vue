<template>
  <div class="home">
    <!-- Hero Section avec glassmorphism -->
    <section class="hero">
      <div class="hero-content">
        <div class="hero-badge fade-in-up">
          <span class="badge-icon">🏆</span>
          Votre transformation commence ici
        </div>
        <h1 class="fade-in-up" style="animation-delay: 0.1s">
          Bienvenue sur <span class="highlight">FitTrack</span>
        </h1>
        <p class="fade-in-up" style="animation-delay: 0.2s">
          Planifiez, suivez et améliorez vos entraînements avec l'application<br>
          qui vous accompagne au quotidien.
        </p>
        <div class="hero-buttons fade-in-up" style="animation-delay: 0.3s">
          <a href="http://127.0.0.1:8000/login" class="btn-primary">
            Commencer maintenant
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </a>
          <a href="#features" class="btn-secondary">
            En savoir plus
          </a>
        </div>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <span class="stat-number">500+</span>
          <span class="stat-label">Utilisateurs</span>
        </div>
        <div class="stat">
          <span class="stat-number">50+</span>
          <span class="stat-label">Exercices</span>
        </div>
        <div class="stat">
          <span class="stat-number">100+</span>
          <span class="stat-label">Programmes</span>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section id="features" class="features">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Pourquoi nous choisir ?</span>
          <h2>Une expérience fitness complète</h2>
        </div>
        <div class="features-grid">
          <div class="feature-card" v-for="feature in features" :key="feature.title">
            <div class="feature-icon">{{ feature.icon }}</div>
            <h3>{{ feature.title }}</h3>
            <p>{{ feature.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Aperçu Exercices -->
    <section class="preview">
      <div class="container">
        <div class="preview-header">
          <div>
            <span class="section-tag">Bibliothèque</span>
            <h2>Exercices populaires</h2>
          </div>
          <RouterLink to="/exercices" class="preview-link">
            Voir tous les exercices →
          </RouterLink>
        </div>
        <div class="preview-grid">
          <ExerciceCard v-for="exercice in exercicesApercu" :key="exercice.id" :exercice="exercice" />
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
      <div class="cta-content">
        <h2>Prêt à commencer votre transformation?</h2>
        <p>Rejoignez FitTrack aujourd'hui et atteignez vos objectifs</p>
        <a href="http://127.0.0.1:8000/login" class="btn-primary btn-large">
          Créer mon compte gratuitement
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'
import ExerciceCard from '../components/ExerciceCard.vue'

const features = ref([
  { icon: '🏋️', title: 'Exercices variés', description: 'Accédez à un catalogue complet d\'exercices par catégorie avec démonstrations.' },
  { icon: '📋', title: 'Programmes sur mesure', description: 'Créez vos propres programmes adaptés à votre niveau et objectifs.' },
  { icon: '📅', title: 'Planification intelligente', description: 'Organisez vos séances semaine après semaine simplement.' },
  { icon: '📊', title: 'Suivi de progression', description: 'Visualisez vos performances et célébrez vos progrès.' },
  { icon: '💡', title: 'Conseils d\'experts', description: 'Des conseils nutrition et récupération pour optimiser.' },
  { icon: '🎯', title: 'Objectifs personnalisés', description: 'Définissez des objectifs et recevez des recommandations.' }
])

const exercicesApercu = ref([
  { id: 1, nom: 'Pompes', description: 'Exercice pour les pectoraux', categorie: 'Force' },
  { id: 2, nom: 'Squat', description: 'Exercice pour les jambes', categorie: 'Force' },
  { id: 3, nom: 'Burpees', description: 'Exercice cardio intense', categorie: 'Cardio' },
])
</script>

<style scoped>
.home {
  overflow-x: hidden;
}

/* Hero Section */
.hero {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
  padding: 80px 24px 60px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%232ecc71' fill-opacity='0.05' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E") repeat-x bottom;
  opacity: 0.5;
}

.hero-content {
  max-width: 800px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(46, 204, 113, 0.15);
  backdrop-filter: blur(4px);
  padding: 8px 16px;
  border-radius: 40px;
  font-size: 14px;
  color: #2ecc71;
  margin-bottom: 24px;
}

.hero h1 {
  font-size: 56px;
  font-weight: 700;
  color: white;
  margin-bottom: 20px;
  line-height: 1.2;
}

.hero .highlight {
  background: linear-gradient(135deg, #2ecc71, #219a52);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.hero p {
  font-size: 18px;
  color: rgba(255,255,255,0.7);
  margin-bottom: 32px;
  line-height: 1.6;
}

.hero-buttons {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 28px;
  border-radius: 40px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s;
}

.btn-primary {
  background: linear-gradient(135deg, #2ecc71, #27ae60);
  color: white;
  box-shadow: 0 4px 15px rgba(46,204,113,0.3);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 25px rgba(46,204,113,0.4);
}

.btn-secondary {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(4px);
  color: white;
  border: 1px solid rgba(255,255,255,0.2);
}

.btn-secondary:hover {
  background: rgba(255,255,255,0.2);
}

.hero-stats {
  max-width: 600px;
  margin: 48px auto 0;
  display: flex;
  justify-content: center;
  gap: 48px;
  padding-top: 32px;
  border-top: 1px solid rgba(255,255,255,0.1);
}

.stat {
  text-align: center;
}

.stat-number {
  display: block;
  font-size: 28px;
  font-weight: 700;
  color: #2ecc71;
}

.stat-label {
  font-size: 14px;
  color: rgba(255,255,255,0.6);
}

/* Sections communes */
.container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 24px;
}

.section-header {
  text-align: center;
  margin-bottom: 48px;
}

.section-tag {
  display: inline-block;
  font-size: 14px;
  font-weight: 600;
  color: #2ecc71;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 12px;
}

.section-header h2 {
  font-size: 36px;
  font-weight: 700;
  color: #1e272e;
}

/* Features Grid */
.features {
  padding: 80px 0;
  background: white;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 32px;
}

.feature-card {
  text-align: center;
  padding: 32px 24px;
  background: #f8f9fa;
  border-radius: 24px;
  transition: all 0.3s;
}

.feature-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

.feature-icon {
  font-size: 48px;
  margin-bottom: 20px;
}

.feature-card h3 {
  font-size: 20px;
  font-weight: 600;
  color: #1e272e;
  margin-bottom: 12px;
}

.feature-card p {
  color: #666;
  line-height: 1.6;
}

/* Preview Section */
.preview {
  padding: 80px 0;
  background: #f8f9fa;
}

.preview-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 40px;
  flex-wrap: wrap;
  gap: 16px;
}

.preview-header h2 {
  font-size: 32px;
  font-weight: 700;
  color: #1e272e;
  margin-top: 8px;
}

.preview-link {
  color: #2ecc71;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}

.preview-link:hover {
  color: #27ae60;
}

.preview-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 24px;
}

/* CTA Section */
.cta {
  padding: 80px 24px;
  background: linear-gradient(135deg, #1e272e, #2c3e50);
  text-align: center;
}

.cta-content {
  max-width: 700px;
  margin: 0 auto;
}

.cta h2 {
  font-size: 36px;
  font-weight: 700;
  color: white;
  margin-bottom: 16px;
}

.cta p {
  font-size: 18px;
  color: rgba(255,255,255,0.7);
  margin-bottom: 32px;
}

.btn-large {
  font-size: 18px;
  padding: 14px 36px;
}

@media (max-width: 768px) {
  .hero h1 { font-size: 36px; }
  .section-header h2 { font-size: 28px; }
  .hero-stats { gap: 24px; }
  .features-grid { grid-template-columns: 1fr; }
}
</style>