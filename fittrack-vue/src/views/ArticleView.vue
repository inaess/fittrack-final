<template>
  <div class="article-page">
    <div v-if="article">
      <section class="page-header">
        <div class="container">
          <span class="categorie-tag">{{ article.categorie }}</span>
          <h1>{{ article.titre }}</h1>
          <p class="date">📅 {{ article.date }}</p>
        </div>
      </section>

      <section class="article-content">
        <div class="container">
          <div class="content-card">
            <p>{{ article.contenu }}</p>
          </div>
          <RouterLink to="/blog" class="btn-retour">← Retour au blog</RouterLink>
        </div>
      </section>
    </div>

    <div v-else class="not-found">
      <h2>Article introuvable</h2>
      <RouterLink to="/blog">← Retour au blog</RouterLink>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()

const articles = [
  { id: 1, titre: '5 exercices pour débuter', categorie: 'Débutant', date: '20 avril 2026', contenu: 'Commencer le sport peut sembler intimidant. Voici 5 exercices simples pour débuter : les pompes pour les pectoraux, les squats pour les jambes, la planche pour les abdominaux, les fentes pour les cuisses, et les burpees pour le cardio. Faites 3 séries de 10 répétitions chaque exercice.' },
  { id: 2, titre: 'Comment bien s\'échauffer', categorie: 'Conseils', date: '18 avril 2026', contenu: 'L\'échauffement est essentiel avant chaque séance. Commencez par 5 minutes de marche rapide, puis des rotations des articulations (chevilles, genoux, hanches, épaules). Ensuite faites quelques étirements dynamiques. Un bon échauffement réduit les risques de blessures de 50%.' },
  { id: 3, titre: 'Nutrition et sport', categorie: 'Nutrition', date: '15 avril 2026', contenu: 'La nutrition joue un rôle crucial dans vos performances sportives. Mangez des glucides complexes avant l\'effort pour l\'énergie, des protéines après l\'effort pour la récupération musculaire. Hydratez-vous bien avec au minimum 2 litres d\'eau par jour.' },
  { id: 4, titre: 'Progresser en musculation', categorie: 'Musculation', date: '10 avril 2026', contenu: 'Pour progresser en musculation, augmentez progressivement les charges chaque semaine. Variez les exercices pour solliciter différents muscles. Dormez suffisamment car c\'est pendant le sommeil que les muscles se reconstruisent. La régularité est la clé du succès.' },
  { id: 5, titre: 'La récupération active', categorie: 'Récupération', date: '5 avril 2026', contenu: 'La récupération active consiste à pratiquer une activité légère entre les séances intenses. La marche, le vélo léger ou le yoga sont parfaits pour cela. Cela permet d\'éliminer les toxines musculaires et de réduire les courbatures tout en restant actif.' },
]

const article = computed(() => {
  return articles.find(a => a.id === parseInt(route.params.id))
})
</script>

<style scoped>
.article-page { background: #f0f2f5; min-height: calc(100vh - 70px); }
.page-header {
  background: linear-gradient(135deg, #1e272e, #2c3e50);
  padding: 60px 24px;
  color: white;
  text-align: center;
}
.categorie-tag {
  display: inline-block;
  background: #2ecc71;
  color: white;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 13px;
  margin-bottom: 16px;
}
.page-header h1 { font-size: 36px; margin-bottom: 12px; }
.date { opacity: 0.7; }
.article-content { padding: 48px 24px; }
.container { max-width: 800px; margin: 0 auto; }
.content-card {
  background: white;
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  line-height: 1.8;
  font-size: 16px;
  color: #444;
  margin-bottom: 24px;
}
.btn-retour {
  color: #27ae60;
  text-decoration: none;
  font-weight: 600;
}
.not-found { text-align: center; padding: 80px; }
</style>