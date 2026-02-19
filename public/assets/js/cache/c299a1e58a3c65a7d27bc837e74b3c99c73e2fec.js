window.SkinchangerUtils = (function() {
    'use strict';

    /**
     * Debounce function to limit execution rate
     * @param {Function} fn - Function to debounce
     * @param {number} wait - Wait time in milliseconds
     * @returns {Function} Debounced function
     */
    function debounce(fn, wait = 300) {
        let timeout;
        const debounced = function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => fn.apply(this, args), wait);
        };
        
        debounced.cancel = () => {
            clearTimeout(timeout);
        };
        
        return debounced;
    }

    /**
     * Fetch with error handling and CSRF token
     * @param {string} url - URL to fetch
     * @param {Object} options - Fetch options
     * @returns {Promise} Fetch promise
     */
    async function fetchWithErrorHandling(url, options = {}) {
        const defaultOptions = {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': getCSRFToken(),
                ...options.headers
            }
        };

        const mergedOptions = { ...defaultOptions, ...options };
        return fetch(url, mergedOptions);
    }

    /**
     * Create FormData object with common fields
     * @param {Object} data - Data to append to FormData
     * @returns {FormData} FormData object
     */
    function createFormData(data = {}) {
        const formData = new FormData();
        
        Object.keys(data).forEach(key => {
            if (data[key] !== null && data[key] !== undefined) {
                formData.append(key, data[key]);
            }
        });
        
        return formData;
    }

    /**
     * Get CSRF token from meta tag
     * @returns {string} CSRF token
     */
    function getCSRFToken() {
        const metaTag = document.querySelector('meta[name="csrf-token"]');
        return metaTag ? metaTag.getAttribute('content') : '';
    }

    /**
     * Show notification using notyf
     * @param {string} message - Message to show
     * @param {string} type - Notification type (success, error, warning, info)
     */
    function showNotification(message, type = 'info') {
        if (typeof notyf !== 'undefined') {
            notyf[type](message);
        } else {
            console.log(`[${type.toUpperCase()}] ${message}`);
        }
    }

    /**
     * Show confirmation dialog
     * @param {string} message - Confirmation message
     * @param {string} type - Dialog type
     * @returns {Promise<boolean>} User confirmation
     */
    function confirmAction(message, type = 'warning') {
        return new Promise((resolve) => {
            if (typeof app !== 'undefined' && app.confirmations) {
                app.confirmations.showConfirmDialog({
                    message: message,
                    type: type,
                    onConfirm: () => resolve(true),
                    onCancel: () => resolve(false)
                });
            } else {
                resolve(confirm(message));
            }
        });
    }

    return {
        debounce,
        fetchWithErrorHandling,
        createFormData,
        getCSRFToken,
        showNotification,
        confirmAction
    };
})(); 