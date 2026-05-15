<template>
  <div class="blog-page">
    <section class="page-header">
      <div class="container">
        <h1>📝 Blog & Conseils Sport</h1>
        <p>Découvrez nos articles pour progresser</p>
      </div>
    </section>

    <section class="blog-grid-section">
      <div class="container">
        <div class="blog-grid">
          <article class="blog-card" v-for="article in articles" :key="article.id">
            <div class="card-image">📖</div>
            <div class="card-content">
              <span class="categorie-tag">{{ article.categorie }}</span>
              <h3>{{ article.titre }}</h3>
              <p>{{ article.resume }}</p>
              <div class="card-meta">
                <span>📅 {{ article.date }}</span>
                <RouterLink :to="`/blog/${article.id}`" class="read-more">
                  Lire l'article
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                  </svg>
                </RouterLink>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const articles = ref([
  { id: 1, titre: '5 exercices pour débuter', resume: 'Découvrez les meilleurs exercices pour commencer votre parcours fitness.', categorie: 'Débutant', date: '20 avril 2026' },
  { id: 2, titre: 'Comment bien s\'échauffer', resume: 'L\'échauffement est essentiel pour éviter les blessures et performer.', categorie: 'Conseils', date: '18 avril 2026' },
  { id: 3, titre: 'Nutrition et sport', resume: 'Bien manger est aussi important que bien s\'entraîner.', categorie: 'Nutrition', date: '15 avril 2026' },
  { id: 4, titre: 'Progresser en musculation', resume: 'Les clés pour continuer à progresser après les premiers mois.', categorie: 'Musculation', date: '10 avril 2026' },
  { id: 5, titre: 'La récupération active', resume: 'Pourquoi et comment bien récupérer après l\'effort.', categorie: 'Récupération', date: '5 avril 2026' },
])
</script>

<style scoped>
.blog-page {
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

.blog-grid-section {
  padding: 48px 24px;
}

.blog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 30px;
  max-width: 1280px;
  margin: 0 auto;
}

.blog-card {
  background: white;
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.blog-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 35px rgba(0,0,0,0.1);
}

.card-image {
  height: 160px;
  background: linear-gradient(135deg, #2ecc71, #27ae60);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 64px;
}

.card-content {
  padding: 24px;
}

.categorie-tag {
  display: inline-block;
  font-size: 12px;
  padding: 4px 12px;
  border-radius: 20px;
  background: #e8f5e9;
  color: #2ecc71;
  font-weight: 500;
  margin-bottom: 12px;
}

.blog-card h3 {
  font-size: 20px;
  font-weight: 600;
  color: #1e272e;
  margin-bottom: 12px;
}

.blog-card p {
  color: #666;
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 16px;
}

.card-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 13px;
  color: #999;
  padding-top: 12px;
  border-top: 1px solid #eee;
}

.read-more {
  color: #2ecc71;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-weight: 500;
  transition: gap 0.3s;
}

.read-more:hover {
  gap: 8px;
}

@media (max-width: 768px) {
  .page-header h1 { font-size: 32px; }
  .blog-grid { grid-template-columns: 1fr; }
}
</style>