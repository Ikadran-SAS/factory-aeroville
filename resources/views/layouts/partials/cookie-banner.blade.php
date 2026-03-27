<!-- Cookie Modal - Exception Style (Axception) -->
<div id="cookie-modal" class="cookie-modal" style="display: none;">
    <div class="cookie-modal-backdrop"></div>
    <div class="cookie-modal-content cookie-exception-modal" id="cookie-modal-draggable">
        <!-- Logo Header -->
        <div class="cookie-exception-logo-section">
            <img src="{{ asset('images/logo.png') }}" alt="Factory & Co" class="cookie-exception-logo">
        </div>

        <!-- Main Content -->
        <div id="cookie-modal-simple" class="cookie-exception-simple">
            <div class="cookie-modal-header" id="cookie-modal-header-drag">
                <h2>Nous respectons votre vie privée</h2>
                <button id="cookie-modal-close" class="cookie-modal-close">&times;</button>
            </div>

            <div class="cookie-modal-body">
                <p class="cookie-modal-intro">
                    Nous utilisons des cookies pour améliorer votre expérience sur notre site.
                    <a href="{{ route('confidentialite') }}" target="_blank">En savoir plus sur notre politique de confidentialité</a>.
                </p>
            </div>

            <div class="cookie-exception-buttons">
                <button id="cookie-accept-all" class="btn btn-pink btn-lg">Accepter tous les cookies</button>
                <button id="cookie-manage" class="btn btn-outline-dark btn-lg">Gérer mes préférences</button>
                <button id="cookie-reject-all" class="btn btn-outline-dark btn-sm">Refuser tout</button>
            </div>
        </div>

        <!-- Detailed Preferences (Hidden by default) -->
        <div id="cookie-modal-detailed" class="cookie-exception-detailed" style="display: none;">
            <div class="cookie-modal-header" id="cookie-modal-header-drag-detail">
                <h2>Gérer vos préférences</h2>
                <button id="cookie-modal-close-detail" class="cookie-modal-close">&times;</button>
            </div>

            <div class="cookie-modal-body">
                <p class="cookie-modal-intro">Personnalisez vos préférences de consentement. Les cookies essentiels sont toujours activés.</p>

                <!-- Essential Cookies -->
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <div class="cookie-category-info">
                            <h3>🔒 Cookies Essentiels</h3>
                            <p>Nécessaires pour le fonctionnement du site (sécurité, sessions)</p>
                        </div>
                        <div class="cookie-toggle">
                            <input type="checkbox" id="cookie-essential" class="cookie-checkbox" checked disabled>
                            <label for="cookie-essential" class="cookie-toggle-label"></label>
                        </div>
                    </div>
                </div>

                <!-- Analytics Cookies -->
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <div class="cookie-category-info">
                            <h3>📊 Analytics</h3>
                            <p>Google Analytics - Mesure l'audience et améliore notre site</p>
                        </div>
                        <div class="cookie-toggle">
                            <input type="checkbox" id="cookie-analytics" class="cookie-checkbox" checked>
                            <label for="cookie-analytics" class="cookie-toggle-label"></label>
                        </div>
                    </div>
                </div>

                <!-- Marketing Cookies -->
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <div class="cookie-category-info">
                            <h3>📢 Marketing & Publicité</h3>
                            <p>Google Ads, pixels de suivi - Personnalise vos expériences</p>
                        </div>
                        <div class="cookie-toggle">
                            <input type="checkbox" id="cookie-marketing" class="cookie-checkbox" checked>
                            <label for="cookie-marketing" class="cookie-toggle-label"></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cookie-modal-footer">
                <button id="cookie-back-to-simple" class="btn btn-outline-dark">Retour</button>
                <button id="cookie-save-preferences" class="btn btn-pink">Enregistrer mes préférences</button>
                <button id="cookie-accept-all-modal" class="btn btn-navy">Accepter tous</button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const CONSENT_COOKIE_NAME = 'cookie_preferences';
    const BANNER_SHOWN_COOKIE = 'cookie_banner_shown';

    // Préférences par défaut
    const defaultPreferences = {
        essential: true,
        analytics: true,
        marketing: true
    };

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    function setCookie(name, value, days = 365) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = `expires=${date.toUTCString()}`;
        document.cookie = `${name}=${value};${expires};path=/`;
    }

    function getPreferences() {
        const saved = getCookie(CONSENT_COOKIE_NAME);
        if (saved) {
            try {
                return JSON.parse(decodeURIComponent(saved));
            } catch (e) {
                return defaultPreferences;
            }
        }
        return defaultPreferences;
    }

    function savePreferences(prefs) {
        setCookie(CONSENT_COOKIE_NAME, encodeURIComponent(JSON.stringify(prefs)));
        updateConsentMode(prefs);
    }

    function updateConsentMode(prefs) {
        const analyticsStorage = prefs.analytics ? 'granted' : 'denied';
        const adStorage = prefs.marketing ? 'granted' : 'denied';

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'consent',
            'gtm.data': {
                'analytics_storage': analyticsStorage,
                'ad_storage': adStorage,
                'ad_user_data': adStorage,
                'ad_personalization': adStorage
            }
        });

        gtag('consent', 'update', {
            'analytics_storage': analyticsStorage,
            'ad_storage': adStorage,
            'ad_user_data': adStorage,
            'ad_personalization': adStorage
        });
    }

    function showBanner() {
        const banner = document.getElementById('cookie-banner');
        if (banner) banner.style.display = 'block';
    }

    function hideBanner() {
        const banner = document.getElementById('cookie-banner');
        if (banner) banner.style.display = 'none';
    }

    function showModal() {
        const modal = document.getElementById('cookie-modal');
        if (modal) modal.style.display = 'block';

        const prefs = getPreferences();
        document.getElementById('cookie-analytics').checked = prefs.analytics;
        document.getElementById('cookie-marketing').checked = prefs.marketing;
    }

    function hideModal() {
        const modal = document.getElementById('cookie-modal');
        if (modal) modal.style.display = 'none';
    }

    function showSimpleView() {
        document.getElementById('cookie-modal-simple').style.display = 'block';
        document.getElementById('cookie-modal-detailed').style.display = 'none';
    }

    function showDetailedView() {
        document.getElementById('cookie-modal-simple').style.display = 'none';
        document.getElementById('cookie-modal-detailed').style.display = 'block';
    }

    // Afficher le modal si jamais vu
    if (!getCookie(BANNER_SHOWN_COOKIE)) {
        // Afficher le modal au chargement
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(showModal, 300);
        });
    } else {
        // Appliquer les préférences sauvegardées
        updateConsentMode(getPreferences());
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Simple view buttons
        const acceptAllBtn = document.getElementById('cookie-accept-all');
        const rejectAllBtn = document.getElementById('cookie-reject-all');
        const manageBtn = document.getElementById('cookie-manage');

        if (acceptAllBtn) {
            acceptAllBtn.addEventListener('click', function() {
                const prefs = { essential: true, analytics: true, marketing: true };
                savePreferences(prefs);
                setCookie(BANNER_SHOWN_COOKIE, 'true');
                hideModal();
            });
        }

        if (rejectAllBtn) {
            rejectAllBtn.addEventListener('click', function() {
                const prefs = { essential: true, analytics: false, marketing: false };
                savePreferences(prefs);
                setCookie(BANNER_SHOWN_COOKIE, 'true');
                hideModal();
            });
        }

        if (manageBtn) {
            manageBtn.addEventListener('click', showDetailedView);
        }

        // Detailed view buttons
        const acceptAllModalBtn = document.getElementById('cookie-accept-all-modal');
        const savePreferencesBtn = document.getElementById('cookie-save-preferences');
        const backBtn = document.getElementById('cookie-back-to-simple');
        const closeModalBtn = document.getElementById('cookie-modal-close');
        const closeDetailBtn = document.getElementById('cookie-modal-close-detail');
        const modalBackdrop = document.querySelector('.cookie-modal-backdrop');

        if (acceptAllModalBtn) {
            acceptAllModalBtn.addEventListener('click', function() {
                const prefs = { essential: true, analytics: true, marketing: true };
                savePreferences(prefs);
                setCookie(BANNER_SHOWN_COOKIE, 'true');
                hideModal();
            });
        }

        if (savePreferencesBtn) {
            savePreferencesBtn.addEventListener('click', function() {
                const prefs = {
                    essential: true,
                    analytics: document.getElementById('cookie-analytics').checked,
                    marketing: document.getElementById('cookie-marketing').checked
                };
                savePreferences(prefs);
                setCookie(BANNER_SHOWN_COOKIE, 'true');
                hideModal();
            });
        }

        if (backBtn) {
            backBtn.addEventListener('click', showSimpleView);
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', hideModal);
        }

        if (closeDetailBtn) {
            closeDetailBtn.addEventListener('click', hideModal);
        }

        if (modalBackdrop) {
            modalBackdrop.addEventListener('click', hideModal);
        }

        // Draggable Modal
        makeDraggable('cookie-modal-draggable', 'cookie-modal-header-drag');
    });

    // Draggable function
    function makeDraggable(elementId, handleId) {
        const element = document.getElementById(elementId);
        const handle = document.getElementById(handleId);

        if (!element || !handle) return;

        let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        let isDragging = false;

        handle.onmousedown = dragMouseDown;
        handle.style.cursor = 'grab';

        function dragMouseDown(e) {
            if (e.target.closest('button')) return;

            e.preventDefault();
            isDragging = true;
            pos3 = e.clientX;
            pos4 = e.clientY;
            handle.style.cursor = 'grabbing';

            document.onmouseup = dragMouseUp;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            if (!isDragging) return;

            e.preventDefault();
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;

            element.style.top = (element.offsetTop - pos2) + 'px';
            element.style.left = (element.offsetLeft - pos1) + 'px';
            element.style.transform = 'none';
        }

        function dragMouseUp() {
            isDragging = false;
            document.onmouseup = null;
            document.onmousemove = null;
            handle.style.cursor = 'grab';
        }
    }
})();
</script>
