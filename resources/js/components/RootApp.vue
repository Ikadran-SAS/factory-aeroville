<template>
  <navigation-modal
    :is-open="isNavigationModalOpen"
    @close="closeNavigationModal"
    @navigate="onNavigate"
  />
</template>

<script setup>
import { ref, onMounted } from 'vue'
import NavigationModal from './NavigationModal.vue'

const isNavigationModalOpen = ref(false)

const openNavigationModal = () => {
  isNavigationModalOpen.value = true
}

const closeNavigationModal = () => {
  isNavigationModalOpen.value = false
}

const onNavigate = (app) => {
  console.log('Navigation app selected:', app)
  closeNavigationModal()
}

// Expose methods to window for use in Blade templates
onMounted(() => {
  window.factoryCoNav = {
    openNavigationModal,
    closeNavigationModal,
  }
})
</script>
