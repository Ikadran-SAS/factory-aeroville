<template>
  <!-- Navigation Modal Overlay -->
  <teleport to="body">
    <Transition name="modal-fade">
      <div v-if="isOpen" class="modal-overlay" @click="closeModal">
        <!-- Modal Content -->
        <div class="modal-content" @click.stop>
          <button class="modal-close" @click="closeModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </button>

          <div class="modal-header">
            <h2>Choisir votre application de navigation</h2>
            <p>30 Rue des Buissons, 93290 Tremblay-en-France</p>
          </div>

          <div class="modal-body">
            <!-- Google Maps Option -->
            <a href="https://www.google.com/maps/search/30+Rue+des+Buissons,+93290+Tremblay-en-France/@48.9912,2.5220,15z" target="_blank" class="nav-option google-maps" @click="trackNavigation('google-maps')">
              <div class="nav-icon">
                <img src="https://www.gstatic.com/images/branding/product/1x/maps_64dp.png" alt="Google Maps" width="48" height="48">
              </div>
              <div class="nav-info">
                <h3>Google Maps</h3>
                <p>Navigation précise et trafic en temps réel</p>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </a>

            <!-- Waze Option -->
            <a href="https://waze.com/ul?q=30%20Rue%20des%20Buissons%2C%2093290%20Tremblay-en-France" target="_blank" class="nav-option waze" @click="trackNavigation('waze')">
              <div class="nav-icon">
                <img src="/images/waze-logo.png" alt="Waze" width="48" height="48">
              </div>
              <div class="nav-info">
                <h3>Waze</h3>
                <p>Navigation sociale avec alertes</p>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </a>

            <!-- Apple Plans Option -->
            <a href="https://maps.apple.com/?address=30%20Rue%20des%20Buissons%2C%2093290%20Tremblay-en-France%2C%20France&adr=1" target="_blank" class="nav-option apple-maps" @click="trackNavigation('apple-maps')">
              <div class="nav-icon">
                <img src="/images/apple-maps-logo.png" alt="Apple Maps" width="48" height="48">
              </div>
              <div class="nav-info">
                <h3>Apple Plans</h3>
                <p>Navigation intégrée à votre iPhone</p>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </a>
          </div>

          <div class="modal-footer">
            <p class="modal-note">Choisissez votre application de navigation préférée</p>
          </div>
        </div>
      </div>
    </Transition>
  </teleport>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue'

defineProps({
  isOpen: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['close', 'navigate'])

const closeModal = () => {
  emit('close')
}

const trackNavigation = (app) => {
  emit('navigate', app)
}
</script>

<style scoped>
/* Modal Overlay */
.modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  padding: 1rem;
}

.modal-content {
  background: white;
  border-radius: 1.5rem;
  max-width: 500px;
  width: 100%;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  overflow: hidden;
  position: relative;
}

.modal-close {
  position: absolute;
  top: 1.5rem;
  right: 1.5rem;
  background: transparent;
  border: none;
  cursor: pointer;
  color: #666;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  transition: all 0.2s ease;
  z-index: 10;
}

.modal-close:hover {
  background: rgba(245, 195, 219, 0.15);
  color: #CC3366;
}

/* Modal Header */
.modal-header {
  padding: 2rem 2rem 1.5rem;
  text-align: center;
  border-bottom: 1px solid rgba(245, 195, 219, 0.15);
}

.modal-header h2 {
  font-family: 'Lexend', sans-serif;
  font-size: 1.5rem;
  color: #1B263A;
  margin: 0 0 0.5rem;
  font-weight: 700;
}

.modal-header p {
  font-family: 'Lexend', sans-serif;
  font-size: 0.95rem;
  color: #999;
  margin: 0;
}

/* Modal Body */
.modal-body {
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.nav-option {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 1.5rem;
  border: 2px solid #eee;
  border-radius: 1rem;
  text-decoration: none;
  transition: all 0.3s ease;
  cursor: pointer;
}

.nav-option:hover {
  border-color: #F5C3DB;
  background: rgba(245, 195, 219, 0.05);
  transform: translateX(4px);
}

.nav-icon {
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 56px;
  height: 56px;
}

.nav-info {
  flex: 1;
}

.nav-info h3 {
  font-family: 'Lexend', sans-serif;
  font-size: 1.1rem;
  color: #1B263A;
  margin: 0 0 0.25rem;
  font-weight: 700;
}

.nav-info p {
  font-family: 'Lexend', sans-serif;
  font-size: 0.85rem;
  color: #999;
  margin: 0;
}

.nav-option svg:last-child {
  flex-shrink: 0;
  color: #F5C3DB;
  opacity: 0;
  transition: all 0.3s ease;
}

.nav-option:hover svg:last-child {
  opacity: 1;
}

/* Modal Footer */
.modal-footer {
  padding: 1rem 2rem;
  background: #FFFBF5;
  border-top: 1px solid rgba(245, 195, 219, 0.15);
  text-align: center;
}

.modal-note {
  font-family: 'Lexend', sans-serif;
  font-size: 0.8rem;
  color: #999;
  margin: 0;
  font-weight: 500;
}

/* Transitions */
.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.3s ease;
}

.modal-fade-enter-from,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active .modal-content {
  animation: slideUp 0.3s ease;
}

.modal-fade-leave-active .modal-content {
  animation: slideDown 0.3s ease;
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideDown {
  from {
    opacity: 1;
    transform: translateY(0);
  }
  to {
    opacity: 0;
    transform: translateY(20px);
  }
}

/* Responsive */
@media (max-width: 480px) {
  .modal-content {
    border-radius: 1rem;
  }

  .modal-header {
    padding: 1.5rem 1.5rem 1rem;
  }

  .modal-header h2 {
    font-size: 1.4rem;
  }

  .modal-body {
    padding: 1.5rem;
    gap: 1rem;
  }

  .nav-option {
    padding: 1rem;
    gap: 1rem;
  }

  .nav-icon {
    width: 48px;
    height: 48px;
  }

  .modal-footer {
    padding: 0.75rem 1.5rem;
  }
}
</style>
