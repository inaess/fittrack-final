<template>
  <div class="exercices">
    <h1>Les Exercices 💪</h1>
    <div class="cards">
      <ExerciceCard 
        v-for="exercice in store.exercices" 
        :key="exercice.id" 
        :exercice="exercice" 
      />
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useExerciceStore } from '../stores/exercice'
import ExerciceCard from '../components/ExerciceCard.vue'

const store = useExerciceStore()

onMounted(() => {
  store.fetchExercices()
})
</script>

<style scoped>
.exercices {
  padding: 30px;
}
.cards {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}
</style>