<template>
  <div class="programme-card">
    <div class="card-header">
      <div class="card-icon">📋</div>
      <span class="niveau-badge">{{ programme.niveau || 'Général' }}</span>
    </div>
    <h3>{{ programme.nom }}</h3>
    <p>{{ programme.description }}</p>
    <div class="card-stats">
      <div class="stat">
        <span>⏱️</span>
        <span>{{ programme.duree || '8 semaines' }}</span>
      </div>
      <div class="stat">
        <span>💪</span>
        <span>{{ programme.exercices || '12' }} exos</span>
      </div>
    </div>
    <div class="card-footer">
    <a href="http://127.0.0.1:8000/login" class="btn-detail">
        Voir le programme
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
    </a>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  programme: Object
})
</script>

<style scoped>
.programme-card {
  background: white;
  border-radius: 20px;
  padding: 24px;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  position: relative;
  overflow: hidden;
}

.programme-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
}

.programme-card.niveau-debutant::before {
  background: linear-gradient(90deg, #2ecc71, #27ae60);
}
.programme-card.niveau-intermédiaire::before,
.programme-card.niveau-intermediaire::before {
  background: linear-gradient(90deg, #f39c12, #e67e22);
}
.programme-card.niveau-avancé::before,
.programme-card.niveau-avance::before {
  background: linear-gradient(90deg, #e74c3c, #c0392b);
}

.programme-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 35px rgba(0,0,0,0.1);
}

.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}

.card-icon {
  font-size: 36px;
}

.niveau-badge {
  font-size: 12px;
  padding: 4px 12px;
  border-radius: 20px;
  font-weight: 500;
}

.niveau-debutant .niveau-badge {
  background: #e8f5e9;
  color: #2ecc71;
}
.niveau-intermédiaire .niveau-badge,
.niveau-intermediaire .niveau-badge {
  background: #fff3e0;
  color: #f39c12;
}
.niveau-avancé .niveau-badge,
.niveau-avance .niveau-badge {
  background: #ffebee;
  color: #e74c3c;
}

.programme-card h3 {
  font-size: 20px;
  font-weight: 600;
  color: #1e272e;
  margin-bottom: 10px;
}

.programme-card p {
  color: #666;
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 16px;
}

.card-stats {
  display: flex;
  gap: 16px;
  margin-bottom: 20px;
  padding: 12px 0;
  border-top: 1px solid #eee;
  border-bottom: 1px solid #eee;
}

.stat {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  color: #666;
}

.card-footer {
  text-align: right;
}

.btn-detail {
  background: none;
  border: none;
  color: #27ae60;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 14px;
  transition: all 0.3s;
}
</style>