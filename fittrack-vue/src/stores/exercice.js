import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useExerciceStore = defineStore('exercice', () => {
  const exercices = ref([])
  const loading = ref(false)
  const error = ref(null)

  async function fetchExercices() {
    loading.value = true
    error.value = null
    try {
      const response = await fetch('http://127.0.0.1:8000/api/exercices')
      exercices.value = await response.json()
    } catch (e) {
      error.value = e.message
    } finally {
      loading.value = false
    }
  }

  return { exercices, loading, error, fetchExercices }
})