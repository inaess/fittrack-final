<template>
  <div class="apropos-page">
    <section class="page-header">
      <div class="container">
        <h1>ℹ️ À propos de FitTrack</h1>
        <p>Votre compagnon sportif au quotidien</p>
      </div>
    </section>

    <section class="mission-section">
      <div class="container">
        <div class="mission-card">
          <div class="mission-icon">🎯</div>
          <h2>Notre mission</h2>
          <p>Rendre le sport accessible à tous, en proposant des outils simples et efficaces pour suivre ses progrès et atteindre ses objectifs.</p>
        </div>
      </div>
    </section>

    <section class="features-section">
      <div class="container">
        <div class="features-grid">
          <div class="feature-card">
            <span>⚙️</span>
            <h3>Comment ça marche ?</h3>
            <p>Créez un compte, ajoutez vos exercices, construisez vos programmes et planifiez vos séances.</p>
          </div>
          <div class="feature-card">
            <span>📈</span>
            <h3>Suivez vos progrès</h3>
            <p>Visualisez vos séances complétées et mesurez votre progression semaine après semaine.</p>
          </div>
          <div class="feature-card">
            <span>💡</span>
            <h3>Conseils personnalisés</h3>
            <p>Recevez des recommandations adaptées à votre niveau et vos objectifs.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="team-section">
      <div class="container">
        <div class="section-header">
          <h2>L'équipe FitTrack</h2>
          <p>Des passionnés de sport et de technologie</p>
        </div>
        <div class="team-grid">
          <div class="team-card">
            <div class="team-avatar">👨‍💻</div>
            <h3>Développeurs</h3>
            <p>Une équipe dédiée à créer la meilleure expérience fitness</p>
          </div>
          <div class="team-card">
            <div class="team-avatar">🏋️</div>
            <h3>Coach sportifs</h3>
            <p>Des experts pour concevoir des programmes efficaces</p>
          </div>
          <div class="team-card">
            <div class="team-avatar">🎨</div>
            <h3>Designers</h3>
            <p>Un design moderne et intuitif pour vous accompagner</p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
</script>

<style scoped>
.apropos-page {
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

.mission-section {
  padding: 60px 24px 40px;
}

.mission-card {
  max-width: 700px;
  margin: 0 auto;
  text-align: center;
  background: white;
  border-radius: 24px;
  padding: 48px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.mission-icon {
  font-size: 64px;
  margin-bottom: 24px;
}

.mission-card h2 {
  font-size: 32px;
  color: #1e272e;
  margin-bottom: 16px;
}

.mission-card p {
  font-size: 18px;
  line-height: 1.6;
  color: #666;
}

.features-section {
  padding: 40px 24px;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  max-width: 1280px;
  margin: 0 auto;
}

.feature-card {
  background: white;
  border-radius: 20px;
  padding: 32px;
  text-align: center;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.feature-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 35px rgba(0,0,0,0.1);
}

.feature-card span {
  font-size: 48px;
  display: block;
  margin-bottom: 20px;
}

.feature-card h3 {
  font-size: 22px;
  color: #1e272e;
  margin-bottom: 12px;
}

.feature-card p {
  color: #666;
  line-height: 1.6;
}

.team-section {
  padding: 40px 24px 80px;
}

.section-header {
  text-align: center;
  margin-bottom: 48px;
}

.section-header h2 {
  font-size: 36px;
  color: #1e272e;
  margin-bottom: 12px;
}

.section-header p {
  color: #666;
  font-size: 18px;
}

.team-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  max-width: 1000px;
  margin: 0 auto;
}

.team-card {
  background: white;
  border-radius: 20px;
  padding: 32px;
  text-align: center;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  transition: all 0.3s;
}

.team-card:hover {
  transform: translateY(-5px);
}

.team-avatar {
  font-size: 56px;
  margin-bottom: 16px;
}

.team-card h3 {
  font-size: 20px;
  color: #1e272e;
  margin-bottom: 12px;
}

.team-card p {
  color: #666;
  font-size: 14px;
  line-height: 1.5;
}

@media (max-width: 768px) {
  .page-header h1 { font-size: 32px; }
  .mission-card { padding: 32px; }
  .mission-card h2 { font-size: 28px; }
  .section-header h2 { font-size: 28px; }
}
</style>