import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ExercicesView from '../views/ExercicesView.vue'
import ProgrammesView from '../views/ProgrammesView.vue'
import BlogView from '../views/BlogView.vue'
import AproposView from '../views/AproposView.vue'
import AvisView from '../views/AvisView.vue'
import ArticleView from '../views/ArticleView.vue'
import DetailExerciceView from '../views/DetailExerciceView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', name: 'home', component: HomeView },
    { path: '/exercices', name: 'exercices', component: ExercicesView },
    { path: '/exercices/:id', name: 'detailExercice', component: DetailExerciceView },
    { path: '/programmes', name: 'programmes', component: ProgrammesView },
    { path: '/blog', name: 'blog', component: BlogView },
    { path: '/blog/:id', name: 'article', component: ArticleView },
    { path: '/apropos', name: 'apropos', component: AproposView },
    { path: '/avis', name: 'avis', component: AvisView },
  ]
})

export default router