<template>
  <div class="app">
    <nav class="navbar">
      <div class="nav-container">
        <div class="navbar-brand">
          <span class="logo-icon">💪</span>
          <span>FitTrack</span>
        </div>
        <div class="navbar-links">
          <RouterLink to="/">Accueil</RouterLink>
          <RouterLink to="/exercices">Exercices</RouterLink>
          <RouterLink to="/programmes">Programmes</RouterLink>
          <RouterLink to="/blog">Blog</RouterLink>
          <RouterLink to="/apropos">À propos</RouterLink>
          <RouterLink to="/avis">Avis</RouterLink>
          <a href="http://127.0.0.1:8000/login" class="btn-connexion">
            <span>Se connecter</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
              <polyline points="16 17 21 12 16 7"/>
              <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
          </a>
        </div>
        <button class="mobile-menu-btn" @click="mobileMenuOpen = !mobileMenuOpen">☰</button>
      </div>
      <div class="mobile-menu" v-if="mobileMenuOpen">
        <RouterLink to="/" @click="mobileMenuOpen = false">Accueil</RouterLink>
        <RouterLink to="/exercices" @click="mobileMenuOpen = false">Exercices</RouterLink>
        <RouterLink to="/programmes" @click="mobileMenuOpen = false">Programmes</RouterLink>
        <RouterLink to="/blog" @click="mobileMenuOpen = false">Blog</RouterLink>
        <RouterLink to="/apropos" @click="mobileMenuOpen = false">À propos</RouterLink>
        <RouterLink to="/avis" @click="mobileMenuOpen = false">Avis</RouterLink>
        <a href="http://127.0.0.1:8000/login" class="mobile-connexion">Se connecter</a>
      </div>
    </nav>
    <main>
      <RouterView />
    </main>
    <footer class="footer">
      <div class="footer-content">
        <div class="footer-brand">
          <span class="logo-icon">💪</span>
          <span>FitTrack</span>
          <p>Votre compagnon sportif au quotidien</p>
        </div>
        <!-- <div class="footer-links">
          <a href="#">Mentions légales</a>
          <a href="#">Confidentialité</a>
          <a href="#">Contact</a>
        </div> -->
        <div class="footer-copyright">
          2026 FitTrack 
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink, RouterView } from 'vue-router'

const mobileMenuOpen = ref(false)
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  background: linear-gradient(135deg, #f5f7fa 0%, #eef2f7 100%);
  min-height: 100vh;
}

.app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

/* Navbar */
.navbar {
  background: rgba(30, 39, 46, 0.95);
  backdrop-filter: blur(10px);
  position: sticky;
  top: 0;
  z-index: 1000;
  border-bottom: 1px solid rgba(255,255,255,0.1);
}

.nav-container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 16px 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.navbar-brand {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 24px;
  font-weight: 700;
  color: white;
}

.logo-icon {
  font-size: 28px;
}

.navbar-links {
  display: flex;
  gap: 32px;
  align-items: center;
}

.navbar-links a {
  color: rgba(255,255,255,0.8);
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s;
  font-size: 15px;
}

.navbar-links a:hover {
  color: #2ecc71;
  transform: translateY(-1px);
}

.navbar-links a.router-link-active {
  color: #2ecc71;
}

.btn-connexion {
  background: linear-gradient(135deg, #2ecc71, #27ae60);
  padding: 8px 20px !important;
  border-radius: 40px;
  display: flex;
  align-items: center;
  gap: 8px;
  color: white !important;
  font-weight: 600 !important;
  transition: all 0.3s !important;
  box-shadow: 0 4px 12px rgba(46,204,113,0.3);
}

.btn-connexion:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(46,204,113,0.4);
  color: white !important;
}

.mobile-menu-btn {
  display: none;
  background: none;
  border: none;
  color: white;
  font-size: 28px;
  cursor: pointer;
}

.mobile-menu {
  display: none;
  flex-direction: column;
  padding: 16px 24px;
  background: #1e272e;
  border-top: 1px solid rgba(255,255,255,0.1);
}

.mobile-menu a {
  padding: 12px 0;
  color: rgba(255,255,255,0.8);
  text-decoration: none;
  border-bottom: 1px solid rgba(255,255,255,0.05);
}

.mobile-connexion {
  background: #2ecc71;
  margin-top: 8px;
  padding: 10px !important;
  text-align: center;
  border-radius: 40px;
  color: white !important;
}

@media (max-width: 768px) {
  .navbar-links {
    display: none;
  }
  .mobile-menu-btn {
    display: block;
  }
  .mobile-menu {
    display: flex;
  }
}

/* Footer */
.footer {
  background: #1e272e;
  color: rgba(255,255,255,0.7);
  margin-top: auto;
  padding: 48px 24px 24px;
}

.footer-content {
  max-width: 1280px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 32px;
}

.footer-brand {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.footer-brand span:first-of-type {
  font-size: 28px;
}

.footer-brand span:last-of-type {
  font-size: 20px;
  font-weight: 700;
  color: white;
}

.footer-brand p {
  font-size: 14px;
  color: rgba(255,255,255,0.5);
}

.footer-links {
  display: flex;
  gap: 32px;
  flex-wrap: wrap;
}

.footer-links a {
  color: rgba(255,255,255,0.6);
  text-decoration: none;
  font-size: 14px;
  transition: color 0.3s;
}

.footer-links a:hover {
  color: #2ecc71;
}

.footer-copyright {
  font-size: 12px;
  color: rgba(255,255,255,0.4);
  padding-top: 24px;
  border-top: 1px solid rgba(255,255,255,0.1);
}

/* Animations globales */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.fade-in-up {
  animation: fadeInUp 0.6s ease-out forwards;
}
</style>