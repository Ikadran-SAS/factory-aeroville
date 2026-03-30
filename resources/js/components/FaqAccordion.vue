<template>
  <div class="faq-accordion-wrapper">
    <div v-if="!faqs || faqs.length === 0" class="empty-state">
      <p>Aucune question disponible</p>
    </div>
    <div v-else class="accordion">
      <div v-for="(faq, index) in faqs" :key="index" class="accordion-item">
        <button 
          class="accordion-trigger"
          @click="toggleItem(index)"
          :aria-expanded="expandedIndex === index"
        >
          <span class="accordion-title">{{ faq.question }}</span>
          <span class="accordion-icon">+</span>
        </button>
        <div v-if="expandedIndex === index" class="accordion-content">
          <p v-html="faq.answer"></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
  faqs: {
    type: Array,
    default: () => ([])
  }
})

const expandedIndex = ref(null)

const toggleItem = (index) => {
  expandedIndex.value = expandedIndex.value === index ? null : index
}
</script>

<style scoped>
.faq-accordion-wrapper {
  width: 100%;
  max-width: 100%;
  margin: 0 auto;
}

.accordion {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}

.accordion-item {
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 0.75rem;
  overflow: hidden;
  transition: all 0.3s ease;
  background: #fff;
}

.accordion-item:hover {
  border-color: #F5C3DB;
  background: rgba(245, 195, 219, 0.05);
}

.accordion-trigger {
  width: 100%;
  padding: 1rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  background: transparent;
  border: none;
  cursor: pointer;
  font-family: 'Lexend', sans-serif;
  font-size: 0.95rem;
  font-weight: 600;
  color: #1a1a1a;
  text-align: left;
  transition: all 0.3s ease;
}

.accordion-trigger:hover {
  color: #F5C3DB;
}

.accordion-trigger[aria-expanded="true"] {
  color: #F5C3DB;
}

.accordion-title {
  flex: 1;
}

.accordion-icon {
  flex-shrink: 0;
  font-size: 1.25rem;
  transition: transform 0.3s ease;
  color: #F5C3DB;
}

.accordion-trigger[aria-expanded="true"] .accordion-icon {
  transform: rotate(45deg);
}

.accordion-content {
  padding: 0 1.5rem 1.5rem;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  color: #555;
  line-height: 1.6;
  font-size: 0.95rem;
}

.accordion-content p {
  margin: 0;
}


.empty-state {
  text-align: center;
  padding: 3rem;
  color: #999;
}

@media (max-width: 768px) {
  .accordion {
    grid-template-columns: 1fr;
  }

  .accordion-trigger {
    padding: 1.25rem;
    font-size: 0.95rem;
  }

  .accordion-content {
    padding: 0 1.25rem 1.25rem;
  }
}
</style>
